<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Cart;
use App\DeliverAdress;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\ProductsAttribute;
use App\Traits\HeaderHelper;
use App\User;
use App\HeaderDetail;
use App\VendorOrder;
use App\VendorOrderProduct;
use Illuminate\Contracts\Session\Session as SessionSession;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use PDF;


class OrderController extends Controller
{
    use HeaderHelper;
    public function orderReview(Request $request){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
        $user = User::where(['id'=>Auth::user()->id])->first();
        $shippingAddress = DeliverAdress::where(['user_id'=>Auth::user()->id])->first();
        $session_id = Session::get('session_id');
        if(Session::get('buy-now-present') == 'true'){
            $items=Session::get('buy-now-item');   
            // dd($items['product_id']);        
            $productDetails = Product::where(['id'=>$items['product_id']])->first();
            $items['image'] = $productDetails->image;
            // dd($items);
            return view('shop.order.buy_now_order')->with(compact('cartItems','user','items','shippingAddress','categories','headerDetails','wishList'));
                
        }
        else{
            $items = Cart::where(['user_id'=>Auth::user()->id])->get();
            foreach($items as $key=>$cart){
                $productDetails = Product::where(['id'=>$cart->product_id])->first();
                // echo "<pre>";print_r($productDetails);die;
                $items[$key]->image = $productDetails->image;
                
            }
        }
       
       
        return view('shop.order.order_review')->with(compact('cartItems','user','items','shippingAddress','categories','headerDetails','wishList'));
    }
    public function placeOrder(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if(!($request->has('paymentMethod'))){
                return redirect()->back()->with('flash_message_error','Please select payment method');
            }
            $user_id = Auth::user()->id;
            $user_email = Auth::user()->email;
            $user_name = Auth::user()->name;
            $shippingAddress = DeliverAdress::where(['user_id'=>$user_id])->first();
            //create order
            $order = new Order();
            if(empty(Session::get('CouponCode'))){
                $coupon_code = 'Not Used';
            }else{
                $coupon_code =Session::get('CouponCode');
            }
            if(empty(Session::get('CouponAmount'))){
                $coupon_amount = '0';
            }else{
                $coupon_amount =Session::get('CouponAmount');
            }
            $order->user_id = $user_id;
            $order->user_email = $user_email;
            $order->name = $user_name;
            $order->address = $shippingAddress->address;
            $order->phone = $shippingAddress->phone;
            $order->coupon_code = $coupon_code;
            $order->coupon_amount= $coupon_amount;
            $order->shipping_charges= $data['shipping_charges'];
            $order->order_status= "New";
            $order->payment_method = $data['paymentMethod'];
            $order->grand_total = $data['totalAmount'];
            $order->save();
            $order_id = DB::getPDO()->lastinsertId();
            // echo "<pre>";print_r($order_id);die;
            if(Session::get('buy-now-present') == 'true'){
                $items=Session::get('buy-now-item');
                $order_product = new OrderProduct();
                $order_product->order_id = $order_id;
                $order_product->user_id = $items['product_owner_id'];
                $order_product->product_id = $items['product_id'];
                $order_product->product_name = $items['product_name'];
                $order_product->product_code = $items['product_code'];
                $order_product->product_color = $items['product_color'];
                $order_product->product_price = $items['product_price'];
                $order_product->product_size = $items['product_size'];
                $order_product->product_qty = $items['product_quantity'];
                // $order_product->save();
                Session::put('order_id',$order_id);
                Session::put('grand_total',$data['totalAmount']);
               return redirect('/thanks');
            }
            $cartItem = Cart::where(['user_id'=>$user_id])->get();
            foreach($cartItem as $product){
                $order_product = new OrderProduct();
                $order_product->order_id = $order_id;
                $order_product->user_id = $user_id;
                $order_product->product_id = $product->product_id;
                $order_product->product_name = $product->product_name;
                $order_product->product_code = $product->product_code;
                $order_product->product_color = $product->product_color;
                $order_product->product_price = $product->product_price;
                $order_product->product_size = $product->product_size;
                $order_product->product_qty = $product->product_quantity;
                $order_product->save();
               
                $productDetails = Product::where(['id'=>$product->product_id])->first();
                if($productDetails->has_attribute ==1){
                    $productAttribute =  ProductsAttribute::where(['size'=>$product->product_size,'product_id'=>$product->product_id])->first();
                    $updateQunatity = $productAttribute->stock - $product->product_quantity;
                    ProductsAttribute::where(['size'=>$product->product_size,'product_id'=>$product->product_id])->update(['stock'=>$updateQunatity]);
                } else{
                    $updateQunatity = $productDetails->stock- $product->product_quantity;
                    Product::where(['id'=>$product->product_id])->update(['stock'=>$updateQunatity]);
                    }
                
            }
            Session::put('order_id',$order_id);
            Session::put('grand_total',$data['totalAmount']);
            $owners = Cart::where(['user_id'=>$user_id])->select('product_owner_id')->distinct()->get();
            foreach($owners as $owner){
                $order = new VendorOrder();
                if(empty(Session::get('CouponCode'))){
                    $coupon_code = 'Not Used';
                }else{
                    $coupon_code =Session::get('CouponCode');
                }
                if(empty(Session::get('CouponAmount'))){
                    $coupon_amount = '0';
                }else{
                    $coupon_amount =Session::get('CouponAmount');
                }
                $order->user_id = $user_id;
                $order->owner_id = $owner->product_owner_id;
                $order->user_email = $user_email;
                $order->name = $user_name;
                $order->address = $shippingAddress->address;
                $order->phone = $shippingAddress->phone;
                $order->coupon_code = $coupon_code;
                $order->coupon_amount= $coupon_amount;
                $order->shipping_charges= $data['shipping_charges'];
                $order->order_status= "New";
                $order->payment_method = $data['paymentMethod'];
                $order->grand_total = $data['totalAmount'];
                $order->save();
                $order_id = DB::getPDO()->lastinsertId();
                foreach($cartItem as $product){
                  if( $owner->product_owner_id == $product->product_owner_id){
                    $order_product = new VendorOrderProduct();
                    $order_product->order_id = $order_id;
                    $order_product->user_id = $user_id;
                    $order_product->product_id = $product->product_id;
                    $order_product->product_name = $product->product_name;
                    $order_product->product_code = $product->product_code;
                    $order_product->product_color = $product->product_color;
                    $order_product->product_price = $product->product_price;
                    $order_product->product_size = $product->product_size;
                    $order_product->product_qty = $product->product_quantity;
                    $order_product->save();
                  }
                }
            }
            return redirect('/thanks');
        }
    }
    public function thanks(){
        $user_id = Auth::user()->id;
        Cart::where(['user_id'=>$user_id])->delete();
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
        return view('shop.order.thanks')->with(compact('cartItems','categories','headerDetails','wishList'));
    }
    public function userOrders(){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
        $user_id = Auth::user()->id;
        $orders = Order::with('products')->where(['user_id'=>$user_id])->orderBy('id','desc')->get();
        return view('shop.userProfile.orders')->with(compact('orders','categories','cartItems','headerDetails','wishList'));
    }
    public function userOrdersDetails($order_id){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
        $orders = Order::with('products')->where(['id'=>$order_id])->orderBy('id','desc')->first();
        return view('shop.userProfile.order_details')->with(compact('orders','categories','cartItems','headerDetails','wishList'));
    }
    public function adminOrders(){
        $orders = Order::with('products')->get();
        return view('admin.orders.orders_view')->with(compact('orders'));
    }
    public function newOrders(){
        $orders = Order::with('products')->where(['order_status'=>'new'])->get();
        return view('admin.orders.orders_view')->with(compact('orders'));
    }
    public function vendorOrders(){
        $orders = VendorOrder::with('products')->where(['owner_id'=>Auth::user()->id])->get();
        return view('admin.orders.orders_view')->with(compact('orders'));
    }
    public function adminOrdersDetails($order_id){
        $orders = Order::with('products')->where(['id'=>$order_id])->orderBy('id','desc')->first();
        $user_id= $orders->user_id;
        $userDetails = User::where(['id'=>$user_id])->first();
        $shippingAddress = DeliverAdress::where(['user_id'=>$user_id])->first();
        return view('admin.orders.orders_details')->with(compact('orders','userDetails','shippingAddress'));
    }
    public function vendorOrdersDetails($order_id){
        $orders = VendorOrder::with('products')->where(['id'=>$order_id])->orderBy('id','desc')->first();
        $user_id= $orders->user_id;
        $userDetails = User::where(['id'=>$user_id])->first();
        $shippingAddress = DeliverAdress::where(['user_id'=>$user_id])->first();
        return view('admin.orders.orders_details')->with(compact('orders','userDetails','shippingAddress'));
    }
    public function updateOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $order_id=$data['order_id'];
            Order::where(['id'=>$order_id])->update(['order_status'=>$data['status']]);
            return redirect()->back()->with('flash_message_success','order status updated');
        }
    }
    public function updateVendorOrderStatus(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $order_id=$data['order_id'];
            VendorOrder::where(['id'=>$order_id])->update(['order_status'=>$data['status']]);
            return redirect()->back()->with('flash_message_success','order status updated');
        }
    }
    public function cancelOrder($id){
        Order::where(['id'=>$id])->delete();
        return redirect()->back()->with('flash_message_error','Order Cancelled');
    }
    public function orderInvoice($order_id)
    {
        $adminOrdersDetails=Order::with('products')->where('id',$order_id)->first();
        $user_id = $adminOrdersDetails ->user_id;
        $userDetails =User::where('id',$user_id)->first();
        //products from the order
        $products = Product::all();
    
        return view ('admin.orders.order_invoice')->with(compact('user_id','userDetails',"adminOrdersDetails","products"));
     }
     public function downloadInvoice($order_id)
    {
        $orders = Order::with('products')->where(['id'=>$order_id])->orderBy('id','desc')->first();
        $user_id= $orders->user_id;
        $userDetails = User::where(['id'=>$user_id])->first();
        $shippingAddress = DeliverAdress::where(['user_id'=>$user_id])->first();
        $pdf = PDF::loadView('shop.order.invoice',compact('orders','userDetails','shippingAddress'));
        // return view ('shop.order.invoice')->with(compact('orders','user_id','userDetails','shippingAddress'));
        return $pdf->download("invoice.pdf");
     }

   
}

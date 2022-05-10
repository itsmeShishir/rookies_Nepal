<?php

namespace App\Http\Controllers;

use App\Cart;
use App\DeliverAdress;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\HeaderDetail;
use App\ProductsAttribute;
use App\Traits\HeaderHelper;
use App\User;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CartController extends Controller
{
    use HeaderHelper;
    public function addToCart(Request $request){
        $data = $request->all();
        // $request->validate([
        //     'product_size'=>'required',
        // ]);
        $proSize = explode("--",$data['product_size']);
        if($data['action']== "buy-now"){
            Session::forget('CouponCode');
            Session::forget('CouponAmount');
            Session::put('buy-now-item',$data);
            Session::put('buy-now-present','true');
            return redirect('/checkout');
        }
       
        $productAttribute = ProductsAttribute::where('id',$proSize[0])->first();
        if($productAttribute&&($productAttribute->stock < $data['product_quantity'])){
            return redirect()->back()->with('flash_message_error','Stock value exceeded');
        }
        Session::forget('CouponCode');
        Session::forget('CouponAmount');
        
        $cart_count = Cart::where('product_id',$data['product_id'])->where('product_name',$data['product_name'])->where('product_code',$data['product_code'])->where('product_color',$data['product_color'])->where('product_size',$proSize[2]??'--')->where('session_id',Session::get('session_id'))->count();
        if($cart_count >0 ){
            return redirect()->back()->with('flash_message_error','Product has already been added to cart');
        }

        $cart = new Cart();
        $cart->product_id = $data['product_id'];
        $cart->product_owner_id = $data['product_owner_id'];
        $cart->product_name = $data['product_name'];
        $cart->product_code = $data['product_code'];
        $cart->product_color = $data['product_color'];
        $cart->product_price = $data['product_price'];
        $cart->product_size = $proSize[2] ?? '';
        $cart->product_quantity = $data['product_quantity'];
        if($data['has_tax']==1){
            $cart->total_price = ($data['product_price']+$data['product_price']*.13)*$data['product_quantity'];
        }
        else{
            $cart->total_price = $data['product_price']*$data['product_quantity'];
        }
        $cart->has_tax = $data['has_tax'];
        $cart->product_attr_id =$proSize[0]?? '';
       
        if(empty(Auth::user()->email)){
            $cart->user_email = '';
        }
        else{
            $cart->user_email = Auth::user()->email;
        }
        $session_id = Session::get('session_id');
        if(empty($session_id)){
            $session_id = Str::random(40);
            Session::put('session_id',$session_id);
        }
        if(Auth::check()){
            $cart->user_id = Auth::user()->id;
            $cart->user_email = Auth::user()->email;
        }
        $cart->session_id = $session_id;
        $cart->save();
        return redirect('/cart')->with('flash_message_success','Added to cart');
    }
    public function cart(Request $request){
        
        if(Auth::check()){
            $session_id = Session::get('session_id');
            $cart = Cart::where(['session_id'=>$session_id])->get();
            foreach($cart as $cartItem){
               Cart::where(['id'=>$cartItem->id])->update(['user_id'=>Auth::user()->id,'user_email'=>Auth::user()->email]);
            }
            $cartItems = Cart::where(['user_id'=>Auth::user()->id])->orWhere(['session_id'=>$session_id])->get();

        }
        else{
            $session_id = Session::get('session_id');
             $cartItems = Cart::where(['session_id'=>$session_id])->get();
        }
        $session_id = Session::get('session_id');
       
        foreach($cartItems as $key=>$cart){
            $productDetails = Product::where(['id'=>$cart->product_id])->first();
            // echo "<pre>";print_r($productDetails);die;
            $cartItems[$key]->image = $productDetails->image;
            
        }
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();

         //end of header section
        return view('shop.cart.cart')->with(compact('cartItems','categories','headerDetails','wishList'));
    }
    public function deleteCart($id =null){
        Cart::where(['id'=>$id])->delete();
        return redirect('/cart')->with('flash_message_error','Cart Item Deleted');
    }
    public function updateQuantity($id = null ,$quantity = null){
        //check for the stock value exceeded
        if($quantity == 1){
            $cart = Cart::where(['id'=>$id])->first();
            $product = Product::where(['id'=>$cart->product_id])->first();
            if($product->has_attribute == 1){
                $productAttribute = ProductsAttribute::where('id',$cart->product_attr_id)->first();
                if($productAttribute->stock < ($cart->product_quantity + 1)){
                return redirect()->back()->with('flash_message_error','Stock value exceeded');
                }
            }
            else{
                if($product->stock < ($cart->product_quantity + 1)){
                    return redirect()->back()->with('flash_message_error','Stock value exceeded');
                    }  
            }
        }
        
        //end of stock check
        Cart::where(['id'=>$id])->increment('product_quantity',$quantity);
        $cart = Cart::where(['id'=>$id])->first();
        if($cart->has_tax ==1){
            $total_price = $cart->product_quantity * ($cart->product_price + $cart->product_price*.13);
        }
        else{
            $total_price = $cart->product_quantity * $cart->product_price;
        }
        
        $cart->update(['total_price'=>$total_price]);
        return redirect()->back()->with('flash_message_success','Quantity Updated');
    }
    
}

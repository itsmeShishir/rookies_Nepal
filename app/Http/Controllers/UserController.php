<?php

namespace App\Http\Controllers;

use App\Cart;
use App\HeaderDetail;
use App\DeliverAdress;
use App\NewsLetter;
use App\SideBanner;
use App\Traits\HeaderHelper;
use App\User;
use Illuminate\Hashing\BcryptHasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use Symfony\Component\Console\Input\Input;

class UserController extends Controller
{
    use HeaderHelper;
    public function auth(){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $wishList = $this->wishList();
         $headerDetails = HeaderDetail::first();
         //end of header section
         $sideBanner = SideBanner::where(['id'=>6])->first();;
        return view('shop.auth.auth_from_cart')->with(compact('cartItems','categories','headerDetails','wishList','sideBanner'));
    }
    public function register(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            if($request->has('checkbox') ) {
                $sameEmail = NewsLetter::where(['email'=>$data['email']])->count();
                if($sameEmail == 0){
                    $newsLetter = new NewsLetter();
                    $newsLetter->email = $data['email'];
                    $newsLetter->save();
                }
            }
            $request->validate([
                'email'=>'required|email',
                'name'=>'required|min:4',
                'password' => 'min:6|required_with:confirm-password|    same:confirm-password',
                'confirm-password' => 'min:6'
            ]);
            $emailVerify = User::where(['email'=>$data['email']])->count();
            if($emailVerify > 0){
                return redirect()->back()->with('flash_message_error','email already exists');
            }
            $user = new User();
            $user->name = $data['name'];
            $user->password = bcrypt($data['password']);
            $user->email = $data['email'];
            $user->status = 1;
            $user->role = 3;
            //role 1 is admin 2 is vendor 3 is normal customer
            $date = date('Y-m-d');
            $user->email_verified_at = $date;
            $user->save();
            
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                Session::put('frontSession',$data['email']);
                if($data['from'] == "front-signin"){
                    return redirect('/');
                }
                if($data['from'] == "front-wishlist"){
                    $product_id = $data['product_id'];
                    return redirect('/products/'.$product_id);
                }
                else{
                    return redirect('/checkout');
                }
            }
        }
    }
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            $request->validate([
                'login-email'=>'required | email',
                'login-password'=>'required|min:6'
            ]);
            if(Auth::attempt(['email'=>$data['login-email'],'password'=>$data['login-password'],'role'=>'3','status'=>'1'])){
                Session::put('frontSession',$data['login-email']);
                if($data['from'] == "front-signin"){
                    return redirect('/');
                }
                if($data['from'] == "front-wishlist"){
                    $product_id = $data['product_id'];
                    return redirect('/products/'.$product_id);
                }
                else{
                    return redirect('/checkout');
                }
            }
            else{
                return redirect()->back()->with('flash_message_error','please enter valid credentials');       
            }
        }
       
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/');
    }
    public function userAccount(){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
        return view('admin.auth.user_account')->with(compact('cartItems','categories','headerDetails','wishList'));
    }
    public function changePassword(Request $request){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
        if($request->isMethod('post')){
            $data = $request->all();
            $userId = Auth::user()->id;
            $user= User::where(['id'=>$userId])->first();
            $old_password = $user->password;
            // echo "<pre>";print_r($old_password);die;
            $new_password = $data['new_password'];
            if(Hash::check($data['old_password'],$old_password)){
                $new_password = bcrypt($new_password);
                User::where(['id'=>Auth::user()->id])->update(['password'=>$new_password]);
                return redirect('/user-change-details')->with('flash_message_success','Your password is changed');
            }
            else{
                return redirect()->back()->with('flash_message_error','Your old password is invalid !');
            }

        }
        return view('admin.auth.change_password')->with(compact('cartItems','categories','headerDetails','wishList'));;
    }
    public function changeDetails(Request $request){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
        if($request->isMethod('post')){
            $data = $request->all();
            User::where(['id'=>Auth::user()->id])->update(['name'=>$data['name'],'email'=>$data['email'],'address'=>$data['address'],'city'=>$data['city'],'phone'=>$data['phone'],'district'=>$data['district'],'area'=>$data['area']]);
            return redirect('/user-change-details')->with('flash_message_success','Details Updated');
        }
        $user = User::where(['id'=>Auth::user()->id])->first();
        return view('shop.userProfile.user_profile')->with(compact('user','cartItems','categories','headerDetails','wishList'));
    }
    public function checkout(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            User::where(['id'=>Auth::user()->id])->update(['phone'=>$data['billing_phone'],'address'=>$data['billing_address'],'district'=>$data['billing_district'],'city'=>$data['billing_city'],'area'=>$data['billing_area']]);
            // echo "<pre>";print_r("looks");die;
            $deliveryAddressCount = DeliverAdress::where(['user_id'=>Auth::user()->id])->count();
            if($deliveryAddressCount > 0){
                DeliverAdress::where(['user_id'=>Auth::user()->id])->update(['address'=>$data['shipping_address'],'phone'=>$data['shipping_phone'],'name'=>$data['shipping_name'],'district'=>$data['shipping_district'],'city'=>$data['shipping_city'],'area'=>$data['shipping_area']]);
            }
           else{
            $deliveryAddress = new DeliverAdress();
            $deliveryAddress->phone = $data['shipping_phone'];
            $deliveryAddress->address = $data['shipping_address'];
            $deliveryAddress->name = $data['shipping_name'];
            $deliveryAddress->district = $data['shipping_district'];
            $deliveryAddress->area = $data['shipping_area'];
            $deliveryAddress->city = $data['shipping_city'];
            $deliveryAddress->user_id = Auth::user()->id;
            $deliveryAddress->save();
           
            
           }
          
           return redirect('/order-review');
        }
        $session_id = Session::get('session_id');
        Cart::where(['session_id'=>$session_id])->update(['user_email'=>Auth::user()->email,'user_id'=>Auth::user()->id]);
        $user = User::where(['id'=>Auth::user()->id])->first();
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $categories = $this->categoryList();
        $headerDetails = HeaderDetail::first();
        $wishList = $this->WishList();
        //end of header section
        return view('shop.cart.checkout')->with(compact('user','cartItems','categories','headerDetails','wishList'));
    }
    public function updateUserStatus(Request $request){
        $data = $request->all();
        User::where('id',$data['id'])->update(['status'=>$data["status"]]);
    }
}

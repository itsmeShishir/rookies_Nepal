<?php

namespace App\Traits;

use App\Product;
use App\Cart;
use App\Category;
use App\WishList;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

trait HeaderHelper{
    public function cartItems(){
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
        foreach($cartItems as $key=>$cart){
            $productDetails = Product::where(['id'=>$cart->product_id])->first();
            // echo "<pre>";print_r($productDetails);die;
            $cartItems[$key]->image = $productDetails->image;
            
        }
        return $cartItems;
    }
    public function categoryList(){
        $category = $categories = Category::with('categories')->where(['parent_id'=>0,'status'=>1])->get();
        return $category;
    }
    public function wishList(){
        if(Auth::check()){
            $wishList = WishList::where(['user_id'=>Auth::user()->id])->get();
            return $wishList;
        }
        return [];
    }
    public function getNewProducts(){
        $products = Product::where(['status'=>0])->get();
        return $products;
    }
}

?>

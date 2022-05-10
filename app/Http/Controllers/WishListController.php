<?php

namespace App\Http\Controllers;

use App\HeaderDetail;
use App\Traits\HeaderHelper;
use App\WishList;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Util\PrioritizedList;
use App\Exports\UsersExport;
use App\Product;
use Maatwebsite\Excel\Facades\Excel;

class WishListController extends Controller
{
    use HeaderHelper;
    public function addToWishList(Request $request,$product_id){
    // echo "<pre>";print_r($product_id);die;
       if(Auth::check()){
           $hasSameProduct = WishList::where(["user_id"=>Auth::user()->id,'product_id'=>$product_id])->count();
           if($hasSameProduct > 0){
            return redirect()->back()->with('flash_message_error','Already Added To WishList');
           }
           $data = $request->all();
           $wishList = new WishList();
           $wishList->user_id = Auth::user()->id;
           $wishList->product_id = $product_id;
           $wishList->product_name = $data['name'];
           $wishList->product_image = $data['image'];
           $wishList->product_price = $data['price'];
           $wishList->save();
           return redirect()->back()->with('flash_message_success','Product Added to WishList');
       }else{
            return redirect('/auth-for-wishlist/'.$product_id)->with('flash_message_error','You must login first to add to wish list');
       }
    }
    public function auth($product_id){
        // echo "<pre>";print_r($product_id);die;
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $categories = $this->categoryList();
        $headerDetails = HeaderDetail::first();
        $wishList = $this->WishList();
        //end of header section
        $product_id = $product_id;
       return view('shop.auth.auth_for_wishlist')->with(compact('cartItems','categories','headerDetails','product_id','wishList'));
   }
   public function deleteWishList($id =null){
    WishList::where(['id'=>$id])->delete();
    return redirect()->back()->with(compact('flash_message_success','item removed from wish list'));
    }
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
    public function userWishList($id){
          // echo "<pre>";print_r($product_id);die;
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $categories = $this->categoryList();
        $headerDetails = HeaderDetail::first();
        $wishList = $this->WishList();
        //end of header section
        return view('shop.userProfile.user_wishlist')->with(compact('cartItems','categories','headerDetails','wishList'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Brand;
use App\HeaderDetail;
use App\Category;
use App\Product;
use App\ProductsAttribute;
use App\ProductsImage;
use App\Review;
use App\SideBanner;
use Illuminate\Http\Request;
use App\Traits\HeaderHelper;
use App\WishList;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    use HeaderHelper;
    public function index(){
      
        $banners = Banner::where(['status'=>1])->orderby('sort_order','asc')->get();
        $sideBanner = SideBanner::orderby('sort_order','asc')->get();
        // echo "<pre>";print_r($sideBanner[0]->image);die;
        $products = Product::where('status',1)->paginate(8);
        $featuredProducts= Product::where(['featured'=>1,'status'=>1])->get();
        $dayDealProducts= Product::where(['day_deal'=>1,'status'=>1])->get();
        $recentProducts= Product::orderBy('created_at','desc')->where(['status'=>1])->paginate(8);
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $wishList = $this->WishList();
        $categories = $this->categoryList();
        $headerDetails = HeaderDetail::first();
        //end of header section
        //brands
        $brands = Brand::where('status',1)->get();
        return view('shop.index',compact('banners','categories','products','featuredProducts','recentProducts','cartItems','sideBanner','headerDetails','brands','wishList','dayDealProducts'));
    }
    public function dayDeals(){
        $dayDealProducts= Product::where(['day_deal'=>1,'status'=>1])->get();
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $wishList = $this->WishList();
        $categories = $this->categoryList();
        $headerDetails = HeaderDetail::first();
        //end of header section
        return view('shop.day_deals',compact('cartItems','headerDetails','wishList','dayDealProducts','categories'));
    }
    public function product($id){
        Session::forget('buy-now-item');
        Session::forget('buy-now-present');
        $productImages = ProductsImage::where('product_id',$id)->get();
        $product = Product::with('attributes')->where(['id'=>$id])->get()->first();
        $featuredProducts= Product::where(['featured'=>1])->get();
        $reviews=Review::where(['product_id'=>$id])->get();
       //for header section categories for search and cart item for cart modal 
       $cartItems = $this->cartItems();
       $categories = $this->categoryList();
       $headerDetails = HeaderDetail::first();
       $wishList = $this->WishList();
       //end of header section
        return view('shop.product_details')->with(compact('product','productImages','featuredProducts','categories','cartItems','headerDetails','wishList','reviews'));
    }
    public function categories($category_id){
        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product::where(['category_id'=>$category_id,'status'=>1])->get();
        $featuredProducts= Product::where(['featured'=>1])->get();
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $wishList = $this->WishList();
         $headerDetails = HeaderDetail::first();
         //end of header section
         $indexCategory = Category::where(['id'=>$category_id])->first();
         $categoryname = $indexCategory->name;
        return view('shop.categories')->with(compact('categories','products','featuredProducts','cartItems','categoryname','headerDetails','wishList'));
    }
    public function getPrice(Request $request){
        $data = $request->all();
        // echo "<pre"; print_r($data);die;
        $proArr = explode("--",$data['idSize']);
        $proAttr = ProductsAttribute::where('id',$proArr[0])->first();
        echo $proAttr->price;
    }
    public function getStock(Request $request){
        $data = $request->all();
        $proArr = explode("--",$data['idSize']);
        // echo "<pre>";print_r($proArr);die;
        $productAttribute = ProductsAttribute::where('id',$proArr[0])->first();
        echo $productAttribute->stock;
    }
    public function auth(){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of headers
         $sideBanner = SideBanner::where(['id'=>6])->first();
        return view('shop.auth.login_register')->with(compact('cartItems','categories','headerDetails','wishList','sideBanner'));
    }
}

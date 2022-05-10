<?php

namespace App\Http\Controllers;

use App\AboutUs;
use App\Faq;
use App\HeaderDetail;
use App\Policy;
use App\TermsAndCondition;
use App\Traits\HeaderHelper;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    use HeaderHelper;
    public function about(){
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $categories = $this->categoryList();
        $wishList = $this->WishList();
        $headerDetails = HeaderDetail::first();
        //end of header section
        $about = AboutUs::first();
        return view('shop.info.about')->with(compact('cartItems','categories','headerDetails','about','wishList'));
    }
    public function policies(){
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $categories = $this->categoryList();
        $headerDetails = HeaderDetail::first();
        $wishList = $this->WishList();
        //end of header section
        $policy = Policy::first();
        return view('shop.info.policies')->with(compact('cartItems','categories','headerDetails','policy','wishList'));
    }
    public function termsAndConditions(){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         $headerDetails = HeaderDetail::first();
         $wishList = $this->WishList();
         //end of header section
         $termsAndConditions = TermsAndCondition::first();
         return view('shop.info.terms_and_conditions')->with(compact('cartItems','categories','headerDetails','termsAndConditions','wishList'));
    }
    public function faqs(){
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $categories = $this->categoryList();
        $headerDetails = HeaderDetail::first();
        $wishList = $this->WishList();
        //end of header section
        $faqs =Faq::first();
        return view('shop.info.faqs')->with(compact('cartItems','categories','headerDetails','faqs','wishList'));
   }
}

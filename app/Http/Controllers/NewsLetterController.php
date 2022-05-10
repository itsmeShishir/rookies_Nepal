<?php

namespace App\Http\Controllers;

use App\HeaderDetail;
use App\NewsLetter;
use App\Traits\HeaderHelper;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\VarDumper\Caster\RedisCaster;

class NewsLetterController extends Controller
{
    use HeaderHelper;

    public function addSubscriber(Request $request){
     //for header section categories for search and cart item for cart modal 
     $cartItems = $this->cartItems();
     $categories = $this->categoryList();
     $headerDetails = HeaderDetail::first();
     $wishList = $this->WishList();
     //end of header section
     $data=$request->all();
     $count = NewsLetter::where(['email'=>$data['EMAIL']])->count();
     if($count>0){
        return redirect()->back()->with('flash_message_error','Already Subscribed with this email address !!!');
     }
     $subscriber = new NewsLetter();
     $subscriber->email = $data['EMAIL'];
     $subscriber->save();
     return view('shop.newsLetter.thanks')->with(compact('cartItems','categories','headerDetails','wishList'));
    }
    public function showSubscribers(){
        $subscribers= NewsLetter::all();
        return view('admin.newsletterSubscriber.newsletter_subscriber')->with((compact('subscribers')));
    }
    public function deleteSubscriber($id){
            NewsLetter::where(['id'=>$id])->delete();
            Alert::success('Delete Success', '1 Newsletter email deleted');
            return redirect()->back();
    }
}

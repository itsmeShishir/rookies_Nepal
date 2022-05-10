<?php

namespace App\Http\Controllers;

use App\ContactTrioplus;
use App\HeaderDetail;
use App\Traits\HeaderHelper;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ContactTrioplusController extends Controller
{
    use HeaderHelper;
    public function contactUs(Request $request)
    {
        if($request->isMethod('POST')){
            $data = $request->all();
            $contactUs = new ContactTrioplus();
            $contactUs->name = $data['name'];
            $contactUs->email = $data['email'];
            $contactUs->subject = $data['subject'];
            $contactUs->message = $data['message'];
            $contactUs->save();
            return redirect('/contact-us/thanks');
        }
        //for header section categories for search and cart item for cart modal 
       $cartItems = $this->cartItems();
       $categories = $this->categoryList();
       $headerDetails = HeaderDetail::first();
       $wishList = $this->WishList();
       //end of header section
        return view('shop.contactUs.contact_trioplus')->with(compact('cartItems','categories','headerDetails','wishList'));
    }
    public function thanks(){
        //for header section categories for search and cart item for cart modal 
        $cartItems = $this->cartItems();
        $categories = $this->categoryList();
        $headerDetails = HeaderDetail::first();
        $wishList = $this->WishList();
        //end of header section
        return view('shop.contactUs.thanks')->with(compact('cartItems','categories','headerDetails','wishList'));
    }
    public function adminFeedbacks(){
        $feedbacks = ContactTrioplus::get();
        return view('admin.feedback.feedback')->with(compact('feedbacks'));
    }
    public function adminFeedbackDelete($id){
        ContactTrioplus::where(['id'=>$id])->delete();
        Alert::success('Delete Success', '1 item deleted');
        return redirect()->back();
    }
}

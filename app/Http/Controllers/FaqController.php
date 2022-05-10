<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            Faq::where(['id'=>$data['id']])->update(['description'=>$data['description']]);
            return redirect()->back()->with('flash_message_success','Descriptions Updated');
        }
        $faq = Faq::first();
        return view("admin.addDetails.addFaqs")->with(compact('faq'));
       }
}

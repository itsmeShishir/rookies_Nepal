<?php

namespace App\Http\Controllers;

use App\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
 
    public function index(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            AboutUs::where(['id'=>$data['id']])->update(['description'=>$data['description']]);
            return redirect()->back()->with('flash_message_success','Descriptions Updated');
        }
        $aboutus = AboutUs::first();
           return view("admin.addDetails.addAboutUs")->with(compact('aboutus'));
       }

    
}

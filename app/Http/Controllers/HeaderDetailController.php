<?php

namespace App\Http\Controllers;

use App\HeaderDetail;
use Illuminate\Http\Request;

class HeaderDetailController extends Controller
{
   public function index(Request $request){
    if($request->isMethod('post')){
        $data = $request->all();
        HeaderDetail::where(['id'=>$data['id']])->update(['phone'=>$data['phone'],'mobile'=>$data['mobile'],'email'=>$data['email'],'about'=>$data['about'],]);
        return redirect()->back()->with('flash_message_success','Details Updated');
    }
    $headerDetails = HeaderDetail::first();
       return view("admin.addDetails.addHeaderDetails")->with(compact('headerDetails'));
   }
}

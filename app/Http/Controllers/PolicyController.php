<?php

namespace App\Http\Controllers;

use App\Policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            Policy::where(['id'=>$data['id']])->update(['description'=>$data['description']]);
            return redirect()->back()->with('flash_message_success','Descriptions Updated');
        }
        $policies = Policy::first();
           return view("admin.addDetails.addPolicy")->with(compact('policies'));
    }
}

<?php

namespace App\Http\Controllers;

use App\TermsAndCondition;
use Illuminate\Http\Request;

class TermsAndConditionController extends Controller
{
    public function index(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            TermsAndCondition::where(['id'=>$data['id']])->update(['description'=>$data['description']]);
            return redirect()->back()->with('flash_message_success','Descriptions Updated');
        }
        $terms = TermsAndCondition::first();
           return view("admin.addDetails.addTermsAndConditions")->with(compact('terms'));
    }
}

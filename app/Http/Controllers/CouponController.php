<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class CouponController extends Controller
{
   public function addCoupons(Request $request){
       if($request->isMethod('POST')){
           $data = $request->all();
           $coupon = new Coupon();
           $coupon->user_id = Auth::user()->id;
           $coupon->coupon_code = $data['coupon_code'];
           $coupon->amount = $data['amount'];
           $coupon->amount_type = $data['amount_type'];
           $coupon->expiry_date = $data['expiry_date'];
           $coupon->save();
           $coupons = Coupon::all();
           return view('admin.coupons.view_coupons')->with(compact('coupons'));
       }
       return view('admin.coupons.add_coupons');
   }
   public function editCoupons(Request $request,$id){
       if($request->isMethod('post')){
           $data = $request->all();
           Coupon::where(['id'=>$id,'user_id'=>Auth::user()->id])->update(['coupon_code'=>$data['coupon_code'],'amount'=>$data['amount'],'amount_type'=>$data['amount_type'],'expiry_date'=>$data['expiry_date']]);
           $coupons = Coupon::all();
           return view('admin.coupons.view_coupons')->with(compact('coupons'));
       }
        $coupon=Coupon::findOrFial(['id'=>$id,'user_id'=>Auth::user()->id])->first();
        return view('admin.coupons.edit_coupons')->with(compact('coupon'));
   }
   public function viewCoupons(){
    if(Auth::user()->role == 1){
        
       $coupons = Coupon::all();
    }
    else{
        $coupons = Coupon::where(['user_id'=>Auth::user()->id])->get(); 
    }
       return view('admin.coupons.view_coupons')->with(compact('coupons'));
   }
   public function updateStatus(Request $request){
    $data = $request->all();
    Coupon::where('id',$data['id'])->update(['status'=>$data["status"]]);
    }
    public function deleteCoupons($id){
        Session::forget('CouponCode');
        Session::forget('CouponAmount');
        Coupon::where(['id'=>$id])->delete();
        Alert::success('Delete Success', '1 item deleted');
        return redirect()->back();
    }
    public function applyDiscount(Request $request){
        Session::forget('CouponCode');
        Session::forget('CouponAmount');
        if($request->method('post')){
            $data=$request->all();
            $couponCount = Coupon::where(['coupon_code'=>$data['coupon_code']])->count();
            if($couponCount == 0){
                return redirect()->back()->with('flash_message_error','no coupon found');
            }
            else{
                $couponDetails = Coupon::where(['coupon_code'=>$data['coupon_code']])->first();
                //coupon code status check
                if($couponDetails->status == 0) {
                    return redirect()->back()->with('flash_message_error','coupon code in not active');
                }
                //check coupon expiry date
                $expiryDate = $couponDetails->expiry_date;
                $currentDate = date('Y-m-d');
                if($expiryDate < $currentDate){
                    return redirect()->back()->with('flash_message_error','date expired of coupon');
                }
                //coupon ready for discount
                $session_id = Session::get('session_id');
                if(Auth::check()){
                    $userCart = Cart::where(['session_id'=>$session_id])->orWhere(['user_id'=>Auth::user()->id])->get();
                }else{
                    $userCart = Cart::where(['session_id'=>$session_id])->get();
                }
               
                $total_amount =0 ;
            
                foreach($userCart as $item){
                    // echo "<pre>";print_r($item->product_quantity * $item->product_price);die;
                    $total_amount =$total_amount + ($item->product_price * $item->product_quantity);
                }
                
                if($couponDetails->amount_type === "fixed"){
                    $couponAmount = $couponDetails->amount;
                }
                else{
                    $couponAmount = $total_amount*($couponDetails->amount/100);
                }
                // dd($couponAmount);
                Session::put('CouponAmount',$couponAmount);
                Session::put('CouponCode',$data['coupon_code']);
                return redirect()->back()->with('flash_message_success','Coupon amount availed');
            }
        }
    }
}

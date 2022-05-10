<?php

namespace App\Http\Controllers;

use App\Traits\HeaderHelper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class VendorController extends Controller
{
    use HeaderHelper;
    public function registerVendor(Request $request){
         //for header section categories for search and cart item for cart modal 
         $cartItems = $this->cartItems();
         $categories = $this->categoryList();
         //end of header section
        if($request->isMethod('POST')){
            $data = $request->all();
            $emailVerify = User::where(['email'=>$data['email']])->count();
            if($emailVerify > 0){
                return redirect()->back()->with('flash_message_error','email already exists');
            }
            $user = new User();
            $user->name = $data['name'];
            $user->password = bcrypt($data['password']);
            $user->email = $data['email'];
            $user->address = $data['address'];
            $user->phone = $data['phone'];
            $user->role = 2;
            //role 1 is admin 2 is vendor 3 is normal customer
            $date = date('Y-m-d');
            $user->email_verified_at = $date;
            $user->save();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
                return redirect('/admin/dashboard');
            }
           
        }
        return view('admin.vendors.auth.register')->with(compact('categories','cartItems'));
    }
    public function adminRegisterVendor(Request $request){
        if($request->isMethod('POST')){
            $data = $request->all();
            $emailVerify = User::where(['email'=>$data['email']])->count();
            if($emailVerify > 0){
                return redirect()->back()->with('flash_message_error','email already exists');
            }
            $user = new User();
            $user->name = $data['name'];
            $user->password = bcrypt($data['password']);
            $user->email = $data['email'];
            $user->address = $data['address'];
            $user->phone = $data['phone'];
            $user->role = 2;
            //role 1 is admin 2 is vendor 3 is normal customer
            $date = date('Y-m-d');
            $user->email_verified_at = $date;
            $user->save();
            Session::flush();
            return redirect('/trioadmin')->with('flash_message_success','Vendor Created, Please login !!!');
        }
        return view('admin.vendors.add_vendor');
    }
    public function updateVendorStatus(Request $request){
        $data = $request->all();
        User::where('id',$data['id'])->update(['status'=>$data["status"]]);
    }
}

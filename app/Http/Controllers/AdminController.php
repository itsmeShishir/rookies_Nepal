<?php

namespace App\Http\Controllers;

use App\ContactTrioplus;
use App\Order;
use App\OrderProduct;
use App\Product;
use App\Traits\HeaderHelper;
use App\User;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    use HeaderHelper;
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['username'],'password'=>$data['password'],'role'=>'1','status'=>'1'])){
                return redirect('admin/dashboard');
            }
            elseif(Auth::attempt(['email'=>$data['username'],'password'=>$data['password'],'role'=>'2','status'=>'1'])){
                return redirect('admin/dashboard');
               
            } 
            else{
                return redirect('/rookiesadmin')->with('flash_message_error','Invalid Username and Password');
            }
        }
        return view('admin.admin_login');
    }
    public function vendors(){
        $vendors = User::where(['role'=>2])->get();
        return view('admin.users.vendor')->with(compact('vendors'));
    }
    public function registeredUsers(){
        $users = User::where(['role'=>3])->get();
        return view('admin.users.registered_users')->with(compact('users'));
    }
    public function dashboard(){
        if(Auth::user()->role == 2){
            $role = 'vendor';
            $totalClient = 0;
            $totalVendors = 0;
            $totalOrders = 0;
            $totalProductsSold = 0;
            return view('admin.dashboard')->with(compact('totalClient','totalVendors','totalOrders','totalProductsSold','role'));    
        }
        $totalClient = User::where(['role'=>3])->count();
        $totalVendors = User::where(['role'=>2])->count();
        $totalOrders = Order::count();
        $totalFeedbacks = ContactTrioplus::count();
        $totalProductsSold = OrderProduct::count();
        $role = 'admin';
        //for header-section
        $newProducts = $this->getNewProducts();
        return view('admin.dashboard')->with(compact('totalClient','totalVendors','totalOrders','totalProductsSold','role','totalFeedbacks','newProducts'));
    }   
    public function logout(){
        Session::flush();
        return redirect('/rookiesadmin')->with('flash_message_success','logged out successfully');
    }
    public function profile(){
        return view('admin.profile.profile');
    }
    public function changePassword(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'old_password'=>'required|min:6',
                'new_password'=>'required|min:6',
            ]);
            $data = $request->all();
            $userId = Auth::user()->id;
            $user= User::where(['id'=>$userId])->first();
            $old_password = $user->password;
            // echo "<pre>";print_r($old_password);die;
            $new_password = $data['new_password'];
            if(Hash::check($data['old_password'],$old_password)){
                $new_password = bcrypt($new_password);
                User::where(['id'=>Auth::user()->id])->update(['password'=>$new_password]);
                return redirect()->back()->with('flash_message_success','Your password is changed');
            }
            else{
                return redirect()->back()->with('flash_message_error','Your old password is invalid !');
            }

        }
        return view('admin.profile.change_password');
    }
    
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }
    public function handleProviderCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        // dd($user);
        //login if user is in the database
        $user_found = User::where('email',$user->getEmail())->first();
        if($user_found){
            Auth::login($user_found);
            Session::put('frontSession',$user_found->email);
            return redirect('/cart');
        }
        else{
            $new_user = new User();
            $new_user->name = $user->getName();
            $new_user->email = $user->getEmail();
            $new_user->password = bcrypt(12345);
            $new_user->role = 3;
            if($new_user->save()){
                Auth::login($new_user);
                Session::put('frontSession',$user->getEmail());
                return redirect('/cart');
            }
        }
    }
}

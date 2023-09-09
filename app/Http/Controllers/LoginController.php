<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('frontend.login_account');
    }

    public function accounts_login(Request $request){

        // return $request;
        // echo $request->email . "<br>";
        // echo $request->password;

        $request->validate([
            'email'=> "required",
            'password'=>'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(auth()->user()->role == "customer"){
                return view('frontend.customer_dashboard');
            }
            elseif(auth()->user()->role == 'seller'){
                return view('frontend.seller_dashboard');
            }
            else{
                return view('home');
            }
        }
        else{
            return back()->with('accounts_login_err', 'These credentials do not match our records.');
        }
    }

}

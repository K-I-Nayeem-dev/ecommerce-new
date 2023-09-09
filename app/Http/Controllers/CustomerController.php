<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customerreg(Request $request){

        // return $request->name;

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password'=>'required',
            'confirm_password'=>'required',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        User::insert([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=> bcrypt($request->password),
            'phone_number'=> $request->phone,
            'role'=> 'customer',
            'login_status'=> 'login',
            'created_at'=> Carbon::now(),
        ]);

        return back()->with('customer_reg_success', 'Customer Registration Successfull');

    }
}

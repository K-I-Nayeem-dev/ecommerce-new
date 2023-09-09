<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function seller(){
        return view('frontend.seller_dashboard');
    }

    public function sellerreg(Request $request){

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
            'role'=> 'seller',
            'login_status'=> 'login',
            'created_at'=> Carbon::now(),
        ]);

        return back()->with('seller_reg_success', 'Seller Registration Successfull');

        // return redirect('/');
    }
}

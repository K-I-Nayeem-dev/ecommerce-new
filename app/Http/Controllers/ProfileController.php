<?php

namespace App\Http\Controllers;

use App\Models\Verfication;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {

        if (Verfication::where('user_id', auth()->user()->id)->exists()) {
            if (Verfication::where('user_id', auth()->user()->id)->first()->status) {
                $verification_status = true;
            }
            else{
                $verification_status = false;
            }
        }
        else{
            $verification_status = false;
        }
        return view('profile',compact('verification_status'));
    }
    
}

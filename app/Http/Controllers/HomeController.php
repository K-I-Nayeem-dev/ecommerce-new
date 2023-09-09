<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use Intervention\Image\ImageManagerStatic as Image;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Carbon;

use App\Models\Verfication;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Password;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        if(Auth::user()->role == "customer"){
            return view('frontend.customer_dashboard');
            // echo 'ehllo';
        }
        elseif(auth()->user()->role == 'seller'){
            return view('frontend.seller_dashboard');
        }
        else{
            return view('home');
        }
    }
    //Profile photo Upload Start

    public function profile_photo_upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image',
        ]);

        $new_name = Auth::user()->id . "." . $request->file('profile_photo')->getClientOriginalExtension();

        $img = Image::make($request->file('profile_photo'))->resize(300, 300);

        $img->save(base_path('public/uploads/profile_photo/' . $new_name), 80);

        User::find(auth()->id())->update(
            [
                'profile_photo' => $new_name,
            ]
        );

        return back()->with("profile", "Profile Photo changed successfully!");
    }
    //Profile photo Upload End

    //Profile Password Changed Start
    public function password_changed(Request $request)
    {

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        // $pass = bcrypt($request->old_password);

        // return $pass;

        if (Hash::check($request->old_password, auth()->user()->password)) {

            User::find(auth()->id())->update(
                [
                    'password' => bcrypt($request->password),
                ]
            );
            return back()->with("status", "Password changed successfully!");
        } else {
            return back()->with("error", "Old Password Doesn't match!");
        }
    }

    //Profile photo Upload End

    //Cover photo Upload Start

    public function cover_photo_upload(Request $request)
    {

        $request->validate([
            'cover_photo' => 'required|image',
        ]);

        $new_name = Auth::user()->id . "." . $request->file('cover_photo')->getClientOriginalExtension();

        $img = Image::make($request->file('cover_photo'))->resize(1600, 451);

        $img->save(base_path('public/uploads/cover_photo/' . $new_name), 80);

        User::find(auth()->id())->update(
            [
                'cover_photo' => $new_name,
            ]
        );
        return back()->with("cover", "Cover Photo changed successfully!");
    }

    //Cover photo Upload End

    //Name Changed Start
    public function name_changed(Request $request)
    {

        $request->validate([
            'name' => 'required|min:4|string|max:255',
        ]);

        User::find(auth()->id())->update(
            [
                'name' => $request['name'],
            ]
        );

        return back()->with("name", "Name changed successfully!");
    }
    //Name Changed End

    //Name Changed Start

    public function email_changed(Request $request)
    {

        $request->validate([
            'email' => 'required'
        ]);

        User::find(auth()->id())->update(
            [
                'email' => $request['email'],
            ]
        );



        return back()->with("email", "Email changed successfully!");
    }
    //Name Changed End

    // Phone Number ADD Start

    public function phone_add(Request $request)
    {

        // echo  $request->phone_number;



        // return back();

        $request->validate([
            'phone_number' => 'required'
        ]);

        User::find(auth()->id())->update([
            'phone_number' => $request['phone_number'],
        ]);



        return back()->with('phoneNumAdded', 'Phone Number Added successfully!');


        // $helo = $request['phone_number'];

        // echo $helo;

    }

    // Phone Number ADD End

    // Phone Number Update Start

    public function phone_number_update(Request $request)
    {

        if(!User::where('id', auth()->user()->id)->first()->phone_number_update_status){

            $request->validate([
            'phone_number' => 'required'
            ]);

            User::find(auth()->id())->update([
                'phone_number' => $request['phone_number'],
                'phone_number_update_status' => true,
            ]);

            return back()->with('phoneNumUpdated', 'Phone Number Update successfully!');
        }

        Verfication::find(auth()->id())->update([
            'phone_number' => $request['phone_number'],

        ]);

        return back()->with('phoneNumUpdated', 'Phone Number Update successfully!');

    }

    // Phone Number Update End

    // Phone Verify Update Start

    public function phone_verify()
    {

        // echo auth()->user()->phone_number;
        // echo auth()->user()->name;
        // $random = Str::upper(Str::random(5));

        // echo $random;

        $random = rand(1000, 9999);
        $url = "http://66.45.237.70/api.php";
        $number = auth()->user()->phone_number;
        $text = "Hello " . auth()->user()->name . ' This is Testing Message & Your OTP is ' . $random . ' Plz Enter OTP to Verify Your Account. !!!! Thank You For Registration ';
        $data = array(
            'username' => "01834833973",
            'password' => "TE47RSDM",
            'number' => "$number",
            'message' => "$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|", $smsresult);
        $sendstatus = $p[0];

        Verfication::insert([
            'user_id' => auth()->user()->id,
            'phone_number' => $number,
            'code' => $random,
            'created_at' => Carbon::now(),
        ]);


        return back()->with('OTP_send', ' OTP Send!');
    }

    // Phone Verify Update End

    // Phone OTP Verify Start

    public function phone_otp_check(Request $request){
        // echo $request->otp_verify;
        // echo Verfication::where('user_id', auth()->user()->id)->first()->code;
        if($request->otp_verify == Verfication::where('user_id', auth()->user()->id)->first()->code){

            Verfication::where('user_id', auth()->user()->id)->update([
                    'status'=>true,
            ]);

            return back()->with('OTP_success', 'Phone Number Verified');

        }
        else{
            return back()->with('OTP_Fail', 'Worng OTP');
        }
    }

    // Phone OTP Verify End

}

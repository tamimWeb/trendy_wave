<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;
use Illuminate\Support\Str;
//use toast 
use RealRashid\SweetAlert\Facades\Alert;

class OtpVerificationController extends Controller
{
    public function emailVerify()
    {
        return view('auth.email-verification');
    }
    //phone verify 
    public function phoneVerify()
    {
        return view('auth.phone-verification');
    }
    //email otp page
    public function emailOtpPage()
    {
        return view('auth.email-otp');
    }
    //phone otp page
    public function phoneOtpPage()
    {
        return view('auth.phone-otp');
    }
    //register 
    public function register()
    {
        return view('auth.register');
    }
    //email otp store
    public function emailOtpStore(Request $request)
    {
        //validate 
        $request->validate(
            [
                'email' => 'required|email|unique:users,email',
            ],
            [
                'email.required' => 'The email field is required.',
                'email.email' => 'The email must be a valid email address.',
                'email.unique' => 'The email has already been taken.',
            ]
        );
        $email = $request->email;
        $otp = rand(1000, 9999);
        $token = Str::random(60);
        Session::put('otp', $otp);
        Session::put('email', $email);
        Session::put('token', $token);
        $otpSent = Mail::send('auth.email-otp-show', ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->input('email'));
            $message->subject('One-Time Password (OTP)');
        });

        $store = DB::table('verifications')->insert([
            'user_type' => 'customer',
            'email' => $email,
            'email_otp' => $otp,
            'token' => $token,
            'created_at' => now(),
        ]);
        if ($store && $otpSent) {
            return redirect()->route('email.otp');
        } else {
            Alert::error('Error', 'OTP sent failed!');
            return back();
        }
    }
    //email otp verify
    public function emailOtpVerify(Request $request)
    {
        $request->validate(
            [
                'email_otp' => 'required | numeric',
            ],
            [
                'email_otp.required' => 'The otp field is required.',
            ]
        );
        $otp = Session::get('otp');
        if ($request->email_otp == $otp) {
            //store email verified at verifications table
            DB::table('verifications')->where('email', $request->session()->get('email'))->update([
                'email_verified_at' => now(),
            ]);
            Session::put('email_verified', true);
            Alert::success('Success', 'Email verified successfully!');
            return redirect()->route('phone.verify');
        } else {
            Alert::error('Error', 'OTP does not match!');
            return redirect()->route('email.otp');
        }
    }
    //phone otp store
    public function phoneOtpStore(Request $request)
    {
        //validate
        $request->validate(
            [
                'phone' => 'required|numeric|unique:users,phone',
            ],
            [
                'phone.required' => 'The phone field is required.',
                'phone.numeric' => 'The phone must be a number.',
                'phone.unique' => 'The phone has already been taken.',
            ]
        );
        $phone = $request->phone;
        $otp_number = rand(1000, 9999);
        Session::put('otp', $otp_number);
        Session::put('phone', $phone);

        $url = "https://api.twilio.com/2010-04-01/Accounts/ACc1275cac4f939a2f6d9749bdea1726d4/Messages.json";
        $from = '+18044093532';
        $to = '+88' . $phone;
        $body = 'Your Trendy Wave Verification Code is ' . $otp_number . '.';
        $id = "ACc1275cac4f939a2f6d9749bdea1726d4";
        $token = 'e2c002c9c60f6e8bd99ecd38c271a7f6';
        $data = array(
            'From' => $from,
            'To' => $to,
            'Body' => $body,
        );
        $post = http_build_query($data);
        $x = curl_init($url);
        curl_setopt($x, CURLOPT_POST, true);
        curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
        curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($x, CURLOPT_POSTFIELDS, $post);
        $y = curl_exec($x);
        curl_close($x);

        // new code by shefat;
        $sid = "ACc1275cac4f939a2f6d9749bdea1726d4";
        $token = "13365b5a04f308a3d6438d292b57e2cb";
        $twilio = new Client($sid, $token);

        $twilio->messages
            ->create(
                $to,
                array(
                    "messagingServiceSid" => "MG7c33c94e86fbc060cbc53f336ee4482f",
                    "body" => $body
                )
            );

        $token = Session::get('token');
        $store = DB::table('verifications')->where('token', $token)->update([
            'phone' => $phone,
            'phone_otp' => $otp_number,
            'created_at' => now(),
        ]);

        if ($store) {
            notify()->success('OTP sent successfully!');
            return view('auth.phone-otp');
        } else {
            notify()->error('OTP sent failed!');
            return back();
        }
    }
    public function phoneOtpVerify(Request $request)
    {
        $otp = Session::get('otp');
        $token = Session::get('token');
        // dd($otp);
        if ($request->phone_otp == $otp) {
            //store phone verified at verifications table
            DB::table('verifications')->where('token', $token)->update([
                'phone_verified_at' => now(),
                'email_otp' => null,
                'phone_otp' => null,
            ]);
            Session::put('phone_verified', true);
            Alert::success('Success', 'Phone verified successfully!');
            return redirect()->route('register');
        } else {
            Alert::error('Error', 'OTP does not match!');
            return redirect()->route('phone.otp');
        }
    }
}
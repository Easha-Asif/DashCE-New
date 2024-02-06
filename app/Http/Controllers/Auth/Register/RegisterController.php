<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Spatie\Permission\Traits\HasRoles;
use App\Classes\Helper;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\Message;
use Illuminate\Support\Str;
use DB;


class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('auth.customregister');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone'  => ['required'],
        ]);

        $referralCode = Str::random(8);
        $referralUrl = route('register', ['referral_code' => $referralCode]);

        if ($request->referring_url) {
            $referredUser = User::where('referral_url', $request->referring_url)->first();
            if ($referredUser) {
                // Increment the points of the referred user
                $referredUser->dash_pass += 10;
                $referredUser->save();
            }
        }

        if ($request->verified_by == 'email') {
            $type = 'email';
            $token = mt_rand(1000, 9999);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'verified_by' => 'email',
            'date' => Carbon::now(),
            'referral_code' => $referralCode,
            'referral_url' => $referralUrl,
            'otp' => mt_rand(1000, 9999)
        ]);

        $user->assignRole('user');

        Mail::send([], [], function (Message $message) use ($user) {
            $message->to($user->email)
                ->subject('Verification Email')
                ->setBody('Your OTP: ' . $user->otp);
        });
        Toastr::success('User created successfully.', 'Success');
        return redirect()->route('verify-otp');
    }


    public function showOtpVerificationForm()
    {
        return view('auth.customverify');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function verifyOtp(Request $request)
    {
        $this->validate($request, [
            'email' => ['required', 'string', 'email'],
            'otp' => ['required', 'numeric', 'digits:4'],
        ]);

        $user = User::where('email', $request->email)->role('user')->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'User is invalid',
            ]);
        }

        if ($user->otp == null) {
            return back()->withErrors([
                'otp' => 'User is already verified',
            ]);
        }
        if ($user->otp != $request->otp) {
            return back()->withErrors([
                'otp' => 'Please enter valid otp',
            ]);
        }

        $user->update(
            [
                'email_verified_at' => date('Y-m-d H:i:s'),
                'otp' => null
            ]
        );

        if ($user->verified_by = 'email') {
            $data = [
                'email' => $user->email,
                'name' => $user->name,
                'subject' => 'Account recovery code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $user], $data);
        }
            // return $apiSuccessResponse('Successfully Verified User', ['user' => GetUser::make($user)], 200);

        Toastr::success('User created successfully.', 'Success');
        return redirect()->route('dashboards.index');
    }

}

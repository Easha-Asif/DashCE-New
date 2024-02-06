<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        $user = User::where('email', $request->email)->whereNull('deleted_at')->first();


        if (!$user) {
            return back()->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }


        // if ($user->hasRole(['user'])) {
        //     return back()->withErrors([
        //         'email' => 'These credentials do not match our records.',
        //     ]);
        // }

        if ($user->status == 1) {
            return back()->withErrors([
                'email' => 'Your account is temporarily blocked. Please contact support.',
            ]);
        }

        if ($user->otp) {
            return back()->withErrors([
                'email' => 'You cannot login Verification OTP.',
            ]);
        }

        if (Auth::attempt($credentials)) {

            $user->update(['last_login' => Carbon::now()]);

            $request->session()->regenerate();

            return redirect()->route('dashboards.index');
        }


        return back()->withErrors([
            'email' => 'These credentials do not match our records.',
        ]);
    }
}

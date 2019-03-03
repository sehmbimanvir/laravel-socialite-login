<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider($provider)
    {
        try {
            return \Socialite::driver($provider)->redirect();
        } catch (\Exception $e) {
            return redirect('login')->with('error', 'Something Went Wrong');
        }
    }
    public function providerCallback($provider)
    {
        try {
            $user = \Socialite::driver($provider)->user();
            $user = \App\User::createFromSocialite($user, $provider);
            Auth::loginUsingId($user->id);
        } catch (\Exception $e) {
            return redirect('login')->with('error', $e->getMessage());
        }
        return redirect('home');
    }
}

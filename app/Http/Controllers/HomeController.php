<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('home');
    }

    /**
     * Get User Profile
     */
    public function getProfile()
    {
        $data['password'] = auth()->user()->password;
        return view('profile')->with($data);
    }

    /**
     * Change User Password
     */
    public function postProfile(Request $request)
    {
        $rules['password'] = 'required|min:6|confirmed';
        $user = auth()->user();
        if ($user->password) {
            $rules['old_password'] = [
                'required', function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail('Old Password is Invalid');
                    }
                }
            ];
        }
        $request->validate($rules);
        $user->password = bcrypt($request->password);
        $user->save();
        return back()->with('success', 'Password Changed Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\mail\RegisterMail;
use Hash;
use Auth;
use Str;
use Mail;

class AuthController extends Controller
{
    // Login
    public function login()
    {
        return view('auth.login');
    }

    // Login Authentication
    public function login_post(Request $request)
    {
        $remember = !empty($remember->remember) ? true : false;
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember))
        {
            if(!empty(Auth::user()->email_verified_at))
            {
                return redirect()->intended('admin/dashboard');
            }
            else
            {
                $user_id = Auth::user()->id;
                Auth::logout();
                $save = User::getSingle($user_id);
                $save->remember_token = Str::random(50);
                $save->save();
                mail::to($save->email)->send(new RegisterMail($save));
                return redirect()->back()->with('warning', 'please first you can verify your email address');
            }
        }
        else
        {
            return redirect()->back()->with('error', "Please enter the correct credentials");
        }

    }

    // Registration
    public function registration()
    {
        return view('auth.registration');
    }

    // Registration Data Insert
    public function registration_post(Request $request)
    {
        $insertData = request()->validate([
            'name'      => 'required',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:6'
        ]);
        $insertData = new User;
        $insertData->name = trim($request->name);
        $insertData->email = trim($request->email);
        $insertData->password = Hash::make($request->password);
        $insertData->remember_token = Str::random(50);
        $insertData->save();
        mail::to($insertData->email)->send(new RegisterMail($insertData));
        return redirect()->back()->with('success', 'Registration hasbeen created successfully and varify your email address');
    }

    // Verify
    public function verify($token)
    {
        $user = User::where('remember_token', '=', $token)->first();
        if(!empty($user))
        {
            $user->email_verified_at = date('Y-m-d H:i:s');
            $user->remember_token = Str::random(50);
            $user->save();
            return redirect('login')->with('success', 'Your account hasbeen varifyed successfully');
        }
        else
        {
            abort(404);
        }
    }

    // Forgot Password
    public function forgot_password()
    {
        return view('auth.forgot');
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect(url('login'));
    }
    
}

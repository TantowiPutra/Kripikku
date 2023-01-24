<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            "title" => "Login",
            "active" => "Login"
        ]);
    }

    public function authenticate(Request $request)
    {
        $validatedData = $request->validate([
            "email" => 'required',
            "password" => 'required'
        ]);

        if ($request['cookie']) {
            // Set waktu remember me ke 30 menit
            $rememberTokenExpire = 30;
            $rememberTokenName = Auth::getRecallerName();
            Cookie::queue('email_cookie', Cookie::get($rememberTokenName), $rememberTokenExpire);
        }

        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('loginFailed', 'Login Attempt Failed! Please Input Correct Email and Password');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}

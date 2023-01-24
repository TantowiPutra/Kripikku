<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            "title" => "Account Registration",
            "active" => "Register"
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|alpha_num',
            'confirmPassword' => 'required|same:password',
            "terms" => 'required'
        ]);

        User::create([
            "username" => $validatedData['username'],
            "email" => $validatedData['email'],
            "password" => bcrypt($validatedData['password'])
        ]);

        return redirect('/login')->with('success', 'Account Successfully Registered!');
    }
}

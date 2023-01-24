<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        return view('profile.index', [
            "title" => $user->username,
            "active" => "Profile",
            "account" => $user
        ]);
    }

    public function update(User $user)
    {
        return view('profile.edit', [
            "title" => $user->username,
            "active" => "Profile",
            "account" => $user
        ]);
    }

    public function confirmUpdate(User $user, Request $request)
    {
        $rules = ([
            'description' => 'required|min:30',
            'image' => 'mimes:jpeg,jpg,png,gif'
        ]);

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:5|unique:users';
        }

        $validatedData = $request->validate($rules);
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('user_image');
        }

        User::where('id', $user->id)->update($validatedData);
        return redirect('/home/profile/' . $user->username)->with('successUpdate', 'Berhasil Update Data');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Register User
    public function register(Request $request) {
        //Validate
        $fields = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ]);

        //Register

        $user= User::create($fields);

        //login
        Auth::login($user);

        //Redirect
        return redirect()->route('posts.index');
    }

    public function login(Request $request) {
        $fields = $request->validate([
        'email' => ['required', 'max:255', 'email'],
        'password' => ['required'],
        ]);

        //try to login the user
        if(Auth::attempt($fields, $request->remember)) {
            return redirect()->intended('dashboard');
        } else {
            return back()->withErrors([
                'failed' => 'The provided credentials do not match our records'
            ]);
        }
    }

    public function logout(Request $request) {
        // dd('ok');
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

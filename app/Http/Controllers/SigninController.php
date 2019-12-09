<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SigninController extends Controller
{
    public function form()
    {
        return view('signin.form');
    }
    public function attempt(Request $request)
    {
        $request->validate([
            'email' => 'email|exists:users,email',
            'password' => 'required',
        ]);
        $attempts = [
            'email' => $request->email,
            'password' => $request->password,
            'is_active' => 1,
        ];
        if (Auth::attempt($attempts, (bool) $request->remember)) {
            return redirect()->intended('/home');
        }
        return redirect()->back();
    }
}
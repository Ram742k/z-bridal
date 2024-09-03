<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        
        $credentials = $request->only('email', 'password');
        

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if ($user->role == 'admin') {
                return redirect('/admin');
            } elseif ($user->role == 'user') {
                return redirect('/user');
            }
        }

        return redirect('/login')->withErrors(['error' => 'Invalid credentials']);
    }
}

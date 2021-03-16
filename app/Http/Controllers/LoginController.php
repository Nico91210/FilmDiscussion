<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials))
        {
            return redirect()->intended();
        }

        return redirect()->route("login")->with('error', "Nom d'utilisateur ou mot de passe incorrect");
    }

    public function logout()
    {
        if (Auth::check())
        {
            Auth::logout();
        }

        return back();
    }
}

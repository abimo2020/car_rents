<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
        } else {
            return redirect()->back();
        }
        return redirect()->route('dashboard');
    }
    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->flush();
        $req->session()->regenerateToken();
        return redirect()->route('login');
    }
}

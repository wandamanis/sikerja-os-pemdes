<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check('login')) {
            return back();
        }
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function back()
    {
        return view('layouts.back', [
            'title' => '505 Error',
            'user' => User::all()
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (auth()->user()->id_level === 3) {
                return redirect()->intended('/dashboard');
            } elseif (auth()->user()->id_level === 2) {
                return redirect()->intended('/admin');
            } elseif (auth()->user()->id_level === 1) {
                return redirect()->intended('/superadmin');
            }
        }
        return back()->with('loginError', 'Login Gagal!');
        // if (Auth::guard('user')->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/dashboard');
        // } elseif (Auth::guard('admin')->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/status');
        // } elseif (Auth::guard('superadmin')->attempt($credentials)) {
        //     $request->session()->regenerate();
        //     return redirect()->intended('/users');
        // } else {
        //     return back()->with('loginError', 'Login Gagal!');
        // }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

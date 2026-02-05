<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showSignUp()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }
    public function showFormLogin()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if(Auth::attempt($request->only('email', 'password'))){
            $request->session()->regenerate();
            if(auth()->user()->role === 'admin') {
                return redirect()->route('dashboard');
            }
            return redirect()->route('catalog.index');
        }
        return back()->withErrors(['email' => 'Email or password is wrong']);
    }
    public function signUp(Request $request)
    {
        $request->validate([
            'name' =>  'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return back()->with('success', 'You have signed up successfully.');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

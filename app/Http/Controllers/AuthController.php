<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|numeric',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }


    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('home');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            return back()->withErrors(['email' => 'Email tidak ditemukan.'])->withInput();
        }
    
        if (!Auth::attempt($request->only('email', 'password'))) {
            return back()->withErrors(['password' => 'Password salah.'])->withInput();
        }
    
        return $this->redirectBasedOnRole(Auth::user());
    }

protected function redirectBasedOnRole($user)
{
    if ($user->role === 'admin') {
        return redirect()->route('admin.dashboard')->with('success', 'Login successful as admin.');
    }

    if ($user->role === 'user') {
        return redirect()->route('home')->with('success', 'Login successful as user.');
    }

    return redirect()->route('login')->withErrors(['access' => 'You do not have access to this page.']);
}

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
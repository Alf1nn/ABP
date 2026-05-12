<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // 1. halaman login
    public function login()
    {
        return view('login');
    }

    // 2. proses login
    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/home');
        } else {
            return back()->with('error', 'Email / password salah');
        }
    }

    // 3. halaman register
    public function registration()
    {
        return view('registration');
    }

    // 4. proses register
    public function register(Request $request)
    {
        User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Registrasi berhasil');
    }

    // 5. halaman home
    public function home()
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        return view('home', [
            'user' => Auth::user()
        ]);
    }

    // 6. logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}

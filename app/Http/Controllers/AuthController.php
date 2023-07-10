<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:user', ['except' => 'logout']);
    }

    public function formLogin()
    {
        return view('auth/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        if (Auth::guard('user')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(config('prefix'));
        }

        return back()->withErrors([
            'email' => 'Identitas tersebut tidak cocok dengan data kami',
            'password' => 'Kata sandi salah.'
        ]);
    }

    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('login');
    }

    public function formRegistration () {
        return view('auth/registration');
    }

    public function registrationProcess (Request $request) {

        $password = Hash::make($request->input('password'));
        $role = 'guest';

        $user = User::create([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $password,
            'role' => $role,
            'jenis_kelamin' => $request->input('jenis-kelamin')
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect('email/verify');

        return redirect('login')->with('message', 'Akun berhasil dibuat!');

    }
}

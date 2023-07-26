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

        if($request->input('nama') == null && $request->input('email') == null && $request->input('password') == null && $request->input('password-validation') == null && $request->input('jenis-kelamin') == null ) {
            return redirect('registrasi')->with('message', 'Semua data wajib diisi!');
        }

        if($request->input('password') == null) {
            return redirect('registrasi')->with('message', 'Kata sandi harus diisi!');
        } else {
            if($request->input('password') == $request->input('password-validation')) {
                $password = Hash::make($request->input('password'));
            } else {
                return redirect('registrasi')->with('message', 'Konfirmasi kata sandi salah!');
            }
        }

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

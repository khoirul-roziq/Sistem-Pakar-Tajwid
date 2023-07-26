<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::findorfail(Auth::id());

        if(Auth::user()->role == 'admin') {
            return view('profile.admin', compact('data'));
        } else {
            return view('profile.guest', compact('data'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if($request->input('password') == null) {
            $password = Auth::user()->password;
        } else {
            if($request->input('password') == $request->input('password-validation')) {
                $password = Hash::make($request->input('password'));
            } else {
                return redirect('profile')->with('message', 'Konfirmasi kata sandi salah!');
            }
        }

        $data = User::findorfail($id)->update([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $password,
            'role' => Auth::user()->role,
            'jenis_kelamin' => $request->input('jenis-kelamin')
        ]);

        return redirect('profile')->with('success', 'Berhasil mengubah profil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

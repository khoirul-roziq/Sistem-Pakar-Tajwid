<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class DataUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $data = User::all();

        return view('admin.data-user.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.data-user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'password' => ['confirmed']
        // ]);

        $password = Hash::make($request->input('password'));

        $data = User::create([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $password,
            'role' => $request->input('role'),
            'jenis_kelamin' => $request->input('jenis-kelamin')
        ]);

        return redirect('data-user')->with('message', 'Berhasil menambahkan user!');
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
        $data = User::findorfail($id);

        return view('admin.data-user.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $password = Hash::make($request->input('password'));

        // setting profile sementara
        if($request->input('role') == null ) {
            $role = Auth::user()->role;
        } else {
            $role = $request->input('role');
        }

        $data = User::findorfail($id)->update([
            'name' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $password,
            'role' => $role,
            'jenis_kelamin' => $request->input('jenis-kelamin')
        ]);

        return redirect('data-user')->with('message', 'Berhasil mengubah data user!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findorfail($id)->delete();
        return redirect('data-user')->with('message', 'Berhasil menghapus data user!');
    }
}

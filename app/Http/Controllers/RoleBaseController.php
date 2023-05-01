<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleBase;
use App\Models\Tajwid;

class RoleBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RoleBase::all();
        // unicode to arabic
        // $str1 = '\u0671\u0644\u0644\u0651\u064e\u0647\u064f'; // string unicode
        // $str1 = json_decode('"' . $str1 . '"'); // convert unicode to string
        // $str1 = html_entity_decode($str1, ENT_QUOTES, 'UTF-8'); // decode HTML entities

        return view('admin.role-base.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Tajwid::all();
        return view('admin.role-base.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = RoleBase::create([
            'kode' => $request->kode,
            'id_tajwid' => $request->tajwid,
            'pattern' => $request->pattern,
        ]);

        return redirect('role-base')->with('message', 'Berhasil menambahkan role base!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.role-base.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tajwid::all();
        $roleBase = RoleBase::findorfail($id);

        // arabic to unicode
        $str2 = 'ٱللَّهُ'; // string Arabic
        $str2 = json_encode($str2); // convert string to JSON
        $str2 = preg_replace('/\\\\u([0-9a-fA-F]{4})/', '\\\\u$1', $str2); // encode unicode

        dd($str2);

        return view('admin.role-base.edit', compact('data', 'roleBase', 'coba'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = RoleBase::findorfail($id)->delete();
        return redirect('role-base')->with('message', 'Berhasil menghapus data role base!');
    }
}

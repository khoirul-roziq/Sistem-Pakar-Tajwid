<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleBase;
use App\Models\Tajwid;
use App\Models\TandaTajwid;

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
        $tandaTajwid = TandaTajwid::all();
        return view('admin.role-base.create', compact('data', 'tandaTajwid'));
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

        $data->tandaTajwid()->sync($request->tandaTajwid);

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
        $tandaTajwid = TandaTajwid::all();
        $roleBase = RoleBase::findorfail($id);

        return view('admin.role-base.edit', compact('data', 'tandaTajwid', 'roleBase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $roleBase = RoleBase::findOrFail($id);

        $roleBase->kode = $request->kode;
        $roleBase->id_tajwid = $request->tajwid;
        $roleBase->pattern = $request->pattern;
        
        $roleBase->save();
    
        $roleBase->tandaTajwid()->sync($request->tandaTajwid);
        
        return redirect('role-base')->with('message', 'Berhasil mengubah data role base!');
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

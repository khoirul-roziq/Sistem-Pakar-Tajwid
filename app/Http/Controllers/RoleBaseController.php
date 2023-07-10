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
        // Menghitung jumlah data role base
        $countRoleBase = RoleBase::all()->count();

        // Buat kode rolebase baru
        $newKodeRoleBase = '';

        if($countRoleBase < 9 ) {
            $newKodeRoleBase = 'R00'. $countRoleBase+1;
        } elseif ($countRoleBase < 99) {
            $newKodeRoleBase = 'R0'. $countRoleBase+1;
        } elseif($countRoleBase < 999) {
            $newKodeRoleBase = 'R'. $countRoleBase+1;
        } else {
            $newKodeRoleBase = 'R'. $countRoleBase+1;
        }

        $data = Tajwid::all();
        $tandaTajwid = TandaTajwid::all();
        $roleBase = RoleBase::all();

        return view('admin.role-base.create', compact('data', 'tandaTajwid', 'newKodeRoleBase', 'roleBase'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // START: Generate Second Role
        if($request->input('second-role') == null) {
            $secondRole = null;
        } else {
            if(strlen($request->input('role')) >= 6){
                // ambil unicode terakhir
                $lastUnicode = substr($request->input('role'), -6);
                
                // generate second role
                $secondRole = str_replace($lastUnicode, '\u0020'.$lastUnicode, $request->input('role'));
                
            } else {
                return 'Role Base Invalid';
            }
        }
        // END: Generate Second Role

        $data = RoleBase::create([
            'kode' => $request->kode,
            'id_tajwid' => $request->tajwid,
            'role' => $request->role,
            'second_role' => $secondRole,
            'keterangan' => $request->keterangan,
            'synonym' => $request->synonym
        ]);

        $data->tandaTajwid()->sync($request->tandaTajwid);

        return redirect('role-base')->with('message', 'Berhasil menambahkan rule tajwid!');
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
        $dataRoleBase = RoleBase::all();

        return view('admin.role-base.edit', compact('data', 'tandaTajwid', 'roleBase', 'dataRoleBase'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // START: Generate Second Role
        if($request->input('second-role') == null) {
            $secondRole = null;
        } else {
            if(strlen($request->input('role')) >= 6){
                // ambil unicode terakhir
                $lastUnicode = substr($request->input('role'), -6);
                
                // generate second role
                $secondRole = str_replace($lastUnicode, '\u0020'.$lastUnicode, $request->input('role'));
                
            } else {
                return 'Role Base Invalid';
            }
        }
        // END: Generate Second Role

        $roleBase = RoleBase::findOrFail($id);

        $roleBase->kode = $request->kode;
        $roleBase->id_tajwid = $request->tajwid;
        $roleBase->role = $request->role;
        $roleBase->second_role = $secondRole;
        $roleBase->keterangan = $request->keterangan;
        $roleBase->synonym = $request->synonym;
        
        $roleBase->save();
    
        $roleBase->tandaTajwid()->sync($request->tandaTajwid);
        
        return redirect('role-base')->with('message', 'Berhasil mengubah data rule tajwid!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = RoleBase::findorfail($id)->delete();
        return redirect('role-base')->with('message', 'Berhasil menghapus data rule tajwid!');
    }
}

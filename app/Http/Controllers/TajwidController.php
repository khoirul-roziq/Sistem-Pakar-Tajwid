<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tajwid;

class TajwidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tajwid::all();

        return view('admin.tajwid.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.tajwid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Tajwid::create([
            'kode' => $request->kode,
            'nama_tajwid' => $request->namaTajwid,
            'penjelasan' => $request->penjelasan,
        ]);

        return redirect('tajwid')->with('message', 'Berhasil menambahkan hukum tajwid!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Tajwid::findorfail($id);
        return view('admin.tajwid.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tajwid::findorfail($id);
        return view('admin.tajwid.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Tajwid::where('id', $id)->update([
            'kode' => $request->kode,
            'nama_tajwid' => $request->namaTajwid,
            'penjelasan' => $request->penjelasan,
        ]);

        return redirect('tajwid')->with('message', 'Berhasil mengubah data tajwid!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Tajwid::findorfail($id)->delete();
        return redirect('tajwid')->with('message', 'Berhasil menghapus data tajwid!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kategori::all();
        return view('admin.kategori.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Kategori::create([
            'nama_kategori' => $request->namaKategori,
            'kode' => $request->kode,
        ]);

        return redirect('kategori')->with('message', 'Berhasil menambahkan kategori!');
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
        $data = Kategori::findorfail($id);
        return view('admin.kategori.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Kategori::findorfail($id)->update([
            'nama_kategori' => $request->namaKategori,
            'kode' => $request->kode,
        ]);

        return redirect('kategori')->with('message', 'Berhasil mengubah kategori!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Kategori::findorfail($id)->delete();
        return redirect('kategori')->with('message', 'Berhasil menghapus kategori!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;

class JawabanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jawaban::all();

        return view('admin.jawaban.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jawaban.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Jawaban::create([
            'kode' => $request->input('kode'),
            'nama_jawaban' => $request->input('namaJawaban'),
            'representasi' => $request->input('representasi'),
            'type' => $request->input('type'),
        ]);

        return redirect('jawaban')->with('message', 'Berhasil menambahkan data pertanyaan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.jawaban.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Jawaban::findorfail($id);

        return view('admin.jawaban.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Jawaban::findorfail($id);

        $data->kode = $request->input('kode');
        $data->nama_jawaban = $request->input('namaJawaban');
        $data->representasi = $request->input('representasi');
        $data->type = $request->input('type');

        $data->save();

        return redirect('jawaban')->with('message', 'Berhasil mengubah data jawaban!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Jawaban::findorfail($id)->delete();

        return redirect('jawaban')->with('message', 'Berhasil menghapus data jawaban!');
    }
}

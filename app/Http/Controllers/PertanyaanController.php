<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Kategori;
use App\Models\Tajwid;

class PertanyaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pertanyaan::all();

        return view('admin.pertanyaan.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Cek ketersediaan K000
        if(Kategori::where('kode', 'K000')->exists()) {
            $idK000 = Kategori::where('kode', 'K000')->first()->id;
        }

        // Cek apakah kode K000 (Inisialisasi kategori) sudah dipilih berdasarkan id
        if(Pertanyaan::where('kategori_id', $idK000)->exists()) {
            // ambil data kategori kecuali Inisialisasi kategori
            $kategori = Kategori::whereNotIn('id', [$idK000])->get();
        } else {
            // ambil semua data kategori
            $kategori = Kategori::all();
        }

        // Auto generate kode
        $newKode = '';
        if(Pertanyaan::count() > 0){
            // aksi ketika table tajwid ada isinya

            // hitung jumlah data pada table tajwid
            $countPertanyaan = Pertanyaan::count();

            // generate kode
            if($countPertanyaan < 10) {
                $newKode = 'P00'.$countPertanyaan;
            } elseif ($countPertanyaan < 100) {
                $newKode = 'P0'.$countPertanyaan;
            } elseif ($countPertanyaan < 1000) {
                $newKode = 'P'.$countPertanyaan;
            } else {
                $newKode = 'P'.$countPertanyaan;
            }
            
        } else {
            // aksi ketika table tajwid kosong

            // generate kode
            $newKode = 'P000';
        }

        $jawaban = Jawaban::all(); 
        $tajwid = Tajwid::all();
        $pertanyaan = Pertanyaan::all();       

        return view('admin.pertanyaan.create', compact('jawaban', 'kategori', 'tajwid', 'pertanyaan', 'newKode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Pertanyaan::create([
            'kode' => $request->kode,
            'soal' => $request->soal,
            'kategori_id' => $request->kategori,
            'tajwid_id' => $request->tajwid,
            'reference' => $request->reference,
        ]);

        $data->jawaban()->sync($request->jawaban);

        return redirect('pertanyaan')->with('message', 'Berhasil menambahkan data pertanyaan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.pertanyaan.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pertanyaan = Pertanyaan::findorfail($id);
        $jawaban = Jawaban::all();
        $kategori = Kategori::all();
        $tajwid = Tajwid::all();  

        return view('admin.pertanyaan.edit', compact('pertanyaan', 'jawaban', 'kategori', 'tajwid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pertanyaan::findorfail($id);

        $data->kode = $request->input('kode');
        $data->soal = $request->input('soal');
        $data->kategori_id = $request->input('kategori');
        $data->tajwid_id = $request->input('tajwid');

        $data->save();

        $data->jawaban()->sync($request->jawaban);

        return redirect('pertanyaan')->with('message', 'Berhasil mengubah data pertanyaan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pertanyaan::findorfail($id)->delete();
        return redirect('pertanyaan')->with('message', 'Berhasil menghapus data pertanyaan!');
    }
}

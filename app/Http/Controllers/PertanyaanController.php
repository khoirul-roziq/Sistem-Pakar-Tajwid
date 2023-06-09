<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jawaban;
use App\Models\Pertanyaan;
use App\Models\Kategori;
use App\Models\Tajwid;
use App\Models\TandaTajwid;

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
        $tandaTajwid = TandaTajwid::all();      

        return view('admin.pertanyaan.create', compact('jawaban', 'kategori', 'tajwid', 'pertanyaan', 'tandaTajwid', 'newKode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $kategori = Kategori::findorfail($request->input('kategori'));
        $tajwid = Tajwid::findorfail($request->input('tajwid'));

        if($kategori->kode == 'K000') {
            $ref = 0;
        } else {
            $ref = $request->reference;
        }

        // cek apakah pertanyaan terakhir untuk setiap hukum tajwid
        if ($request->input('last-question')) {
            $lastQuestion = true;
        } else {
            $lastQuestion = false;
        }

        $data = Pertanyaan::create([
            'kode' => $request->kode,
            'soal' => $request->soal,
            'kategori_id' => $request->kategori,
            'tajwid_id' => $request->tajwid,
            'reference' => $ref,
            'last_question' => $lastQuestion,
        ]);
        
        if($kategori->kode == 'K000'){
            $data->kategoriJawaban()->sync($request->jawaban);
        } else {
            if($tajwid->kode == 'H000') {
                $data->tajwidJawaban()->sync($request->jawaban);
            } else {
                $data->tandaTajwidJawaban()->sync($request->jawaban);
            }
        }

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
        $dataPertanyaan = Pertanyaan::all();
        $jawaban = Jawaban::all();
        $kategori = Kategori::all();
        $tajwid = Tajwid::all();  
        $tandaTajwid = TandaTajwid::all();

        return view('admin.pertanyaan.edit', compact('pertanyaan', 'jawaban', 'kategori', 'tajwid', 'tandaTajwid', 'dataPertanyaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Pertanyaan::findorfail($id);
        $kategori = Kategori::findorfail($request->input('kategori'));
        $tajwid = Tajwid::findorfail($request->input('tajwid'));

        // cek apakah pertanyaan terakhir untuk setiap hukum tajwid
        if ($request->input('last-question')) {
            $lastQuestion = true;
        } else {
            $lastQuestion = false;
        }

        $data->kode = $request->input('kode');
        $data->soal = $request->input('soal');
        $data->kategori_id = $request->input('kategori');
        $data->tajwid_id = $request->input('tajwid');
        $data->reference = $request->input('reference');
        $data->last_question = $lastQuestion;

        $data->save();

        if($kategori->kode == 'K000'){
            $data->kategoriJawaban()->sync($request->jawaban);
        } else {
            if($tajwid->kode == 'H000') {
                $data->tajwidJawaban()->sync($request->jawaban);
            } else {
                $data->tandaTajwidJawaban()->sync($request->jawaban);
            }
        }

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

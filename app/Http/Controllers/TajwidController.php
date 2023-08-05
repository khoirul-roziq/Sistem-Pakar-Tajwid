<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tajwid;
use App\Models\Kategori;
use GuzzleHttp\Client;

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
        // Cek ketersediaan K000
        if(Kategori::where('kode', 'K000')->exists()) {
            $idK000 = Kategori::where('kode', 'K000')->first()->id;
        }

        // Cek apakah kode K000 (Inisialisasi kategori) sudah dipilih berdasarkan id
        if(Tajwid::where('kategori_id', $idK000)->exists()) {
            // ambil data kategori kecuali Inisialisasi kategori
            $kategori = Kategori::whereNotIn('id', [$idK000])->get();
        } else {
            // ambil semua data kategori
            $kategori = Kategori::all();
        }

        // Auto generate kode
        $newKode = '';
        if(Tajwid::count() > 0){
            // aksi ketika table tajwid ada isinya

            // hitung jumlah data pada table tajwid
            $countTajwid = Tajwid::count();

            // generate kode
            if($countTajwid < 10) {
                $newKode = 'H00'.$countTajwid;
            } elseif ($countTajwid < 100) {
                $newKode = 'H0'.$countTajwid;
            } elseif ($countTajwid < 1000) {
                $newKode = 'H'.$countTajwid;
            } else {
                $newKode = 'H'.$countTajwid;
            }
            
        } else {
            // aksi ketika table tajwid kosong

            // generate kode
            $newKode = 'H000';
        }

        $session = session();
        $client = new Client();
        $response = $client->get('http://api.alquran.cloud/v1/meta');
        $data = json_decode($response->getBody(), true);

        $surahs = $data['data']['surahs']['references'];

        return view('admin.tajwid.create', compact('kategori', 'newKode', 'surahs'));
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
            'kategori_id' => $request->kategori,
            'ex_surah' => $request->surah,
            'ex_ayah' => $request->ayah,
            'pattern_ex' => $request->patternEx
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
        $tajwid = Tajwid::findorfail($id);
        $kategori = Kategori::all();

        $session = session();
        $client = new Client();
        $response = $client->get('http://api.alquran.cloud/v1/meta');
        $data = json_decode($response->getBody(), true);

        $surahs = $data['data']['surahs']['references'];

        if($tajwid->ex_surah != null) {
            $thisSurah = $surahs[$tajwid->ex_surah-1];
        } else {
            $thisSurah = null;
        }

        return view('admin.tajwid.edit', compact('tajwid', 'kategori', 'surahs', 'thisSurah'));
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
            'kategori_id' => $request->kategori,
            'ex_surah' => $request->surah,
            'ex_ayah' => $request->ayah,
            'pattern_ex' => $request->patternEx,
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

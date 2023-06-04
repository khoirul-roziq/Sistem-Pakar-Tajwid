<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TandaTajwid;

class TandaTajwidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TandaTajwid::all();
        return view('admin.tanda-tajwid.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Auto generate kode
        $newKode = '';
        if(TandaTajwid::count() > 0){
            // aksi ketika table tajwid ada isinya

            // hitung jumlah data pada table tajwid dan ditambah 1
            $countTandaTajwid = TandaTajwid::count() + 1;

            // generate kode
            if($countTandaTajwid < 10) {
                $newKode = 'T00'.$countTandaTajwid;
            } elseif ($countTandaTajwid < 100) {
                $newKode = 'T0'.$countTandaTajwid;
            } elseif ($countTandaTajwid < 1000) {
                $newKode = 'T'.$countTandaTajwid;
            } else {
                $newKode = 'T'.$countTandaTajwid;
            }
            
        } else {
            // aksi ketika table tajwid kosong

            // generate kode
            $newKode = 'T001';
        }

        return view('admin.tanda-tajwid.create', compact('newKode'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = TandaTajwid::create([
            'nama_tanda' => $request->namaTanda,
            'kode' => $request->kode,
            'unicode' => $request->unicode,
            'jenis' =>$request->jenis
        ]);

        return redirect('tanda-tajwid')->with('message', 'Berhasil menambahkan tanda tajwid!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = TandaTajwid::findorfail($id);
        return view('admin.tanda-tajwid.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = TandaTajwid::findorfail($id);
        return view('admin.tanda-tajwid.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = TandaTajwid::where('id', $id)->update([
            'nama_tanda' => $request->namaTanda,
            'kode' => $request->kode,
            'unicode' => $request->unicode,
            'jenis' =>$request->jenis
        ]);

        return redirect('tanda-tajwid')->with('message', 'Berhasil mengubah tanda tajwid!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = TandaTajwid::findorfail($id)->delete();
        return redirect('tanda-tajwid')->with('message', 'Berhasil menghapus data tanda tajwid!');
    }
}

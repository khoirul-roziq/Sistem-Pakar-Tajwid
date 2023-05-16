<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pertanyaan;
use App\Models\Kategori;


class ConsultationController extends Controller
{

    // index untuk mengakses halaman dengan pertanyaan  yang memiliki inisialisasi
    public function index()
    {
        // Cek ketersediaan K000
        if (Kategori::where('kode', 'K000')->exists()) {
            $idK000 = Kategori::where('kode', 'K000')->first()->id;
        }

        // Cek apakah kode K000 (Inisialisasi kategori) sudah dipilih berdasarkan id
        if (Pertanyaan::where('kategori_id', $idK000)->exists()) {
            // ambil data pertanyaan yang memiliki kategori inisialisasi berdasarkan kategori id
            $pertanyaan = Pertanyaan::where('kategori_id', $idK000)->first();
        } else {
            $pertanyaan = false;
        }

        return view('konsultasi.pertanyaan', compact('pertanyaan'));
    }

    public function konsultasi(Request $request)
    {

        // retrive data jawaban berdasarkan request
        $jawaban = Jawaban::findorfail($request->jawaban);

        $session = session();

        // cek tipe jawaban
        if ($jawaban->type == 'kategori') {

            // retrive data kategori berdasarkan representasi jawaban
            $kategori = Kategori::where('nama_kategori', $jawaban->representasi)->first();

            // temporary storage menggunakan session
            // cek ketersediaan session pertanyaan
            if ($session->has('pertanyaan') == null) {

                // retrive data pertanyaan berdasarkan kategori 
                $pertanyaan = Pertanyaan::where('kategori_id', $kategori->id)->first();

                // create session pertanyaan
                $session->put('pertanyaan', [$pertanyaan->id]);
                $session->put('kategori', $kategori->id);
                $session->put('pattern', '');
            } elseif ($session->has('pertanyaan')) {
                
            }
        } elseif ($jawaban->type == 'hukum') {

            // 
            $pertanyaan = Pertanyaan::where('kategori_id', $session->get('kategori'))
                ->whereNotIn('id', $session->get('pertanyaan'))
                ->get();

            if ($pertanyaan->isNotEmpty()) {
                $pertanyaan = $pertanyaan[0];
                $session->push('pertanyaan', $pertanyaan->id);
            } else {
                // Lakukan penanganan jika array kosong, misalnya mengembalikan pesan error atau melakukan tindakan alternatif

                $pattern = $session->get('pattern');

                return redirect()->route('get.surah')->with('pattern', $pattern);
                
            }
 
        } elseif ($jawaban->type == 'tanda') {

            // retrive data peryantaan yang belum ditampilkan
            $pertanyaan = Pertanyaan::where('kategori_id', $session->get('kategori'))
                ->whereNotIn('id', $session->get('pertanyaan'))
                ->get();

            if ($pertanyaan->isNotEmpty()) {
                $pertanyaan = $pertanyaan[0];

                // tambah id pertanyaan yang sudah dikeluarkan berdasarkan id
                $session->push('pertanyaan', $pertanyaan->id);

                // merge pattern dari session dan jawaban
                $pattern = $session->get('pattern') . $jawaban->representasi;
                $session->put('pattern', $pattern);
            } else {
                // Lakukan penanganan jika array kosong, misalnya mengembalikan pesan error atau melakukan tindakan alternatif
                $pattern = $session->get('pattern') . $jawaban->representasi;

                // simpan pattern baru
                $session->put('pattern', $pattern);

                $pattern = $session->get('pattern');

                return redirect()->route('get.surah')->with('pattern', $pattern);
            }
        }

        return view('konsultasi.pertanyaan', compact('pertanyaan'));
    }

    public function hasil(Request $request)
    {

        // Konversi text arab menjadi unicode
        // Mengambil nilai input dari objek $request dengan nama "valueText"
        $inputValue = $request->valueText;

        // Mengubah nilai input menjadi representasi JSON
        $jsonValue = json_encode($inputValue);

        // Mengganti semua urutan karakter "\uXXXX" dengan karakter Unicode yang sesuai
        $unicodeValue = preg_replace('/\\\\u([0-9a-fA-F]{4})/', '\\\\u$1', $jsonValue);

        // Menghapus tanda kutip ganda di awal dan akhir string
        $textValue = trim($unicodeValue, '"');

        // dd($request->input('valueText'),
        //     $request->input('valueAyah'),
        //     $request->input('valueSurah'),
        //     $request->input('valuePattern'),
        //     $textValue
        // );

        $data = [

        ];
        return view('konsultasi.hasil', compact('data'));
    }
}

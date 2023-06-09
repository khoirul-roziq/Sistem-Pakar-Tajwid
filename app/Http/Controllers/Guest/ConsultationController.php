<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Jawaban;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pertanyaan;
use App\Models\Kategori;
use App\Models\Tajwid;
use App\Models\TandaTajwid;
use App\Models\RoleBase;


class ConsultationController extends Controller
{

    // index untuk mengakses halaman dengan pertanyaan  yang memiliki inisialisasi
    public function index()
    {
        // Cek ketersediaan K000
        if (Kategori::where('kode', 'K000')->exists()) {
            $idK000 = Kategori::where('kode', 'K000')->first()->id;

            // Cek apakah kode K000 (Inisialisasi kategori) sudah dipilih berdasarkan id
            if (Pertanyaan::where('kategori_id', $idK000)->exists()) {
                // ambil data pertanyaan yang memiliki kategori inisialisasi berdasarkan kategori id
                $pertanyaan = Pertanyaan::where('kategori_id', $idK000)->first();
            } else {
                return 'kategori_id not found.';
            }
        } else {
            return 'K000 not found.';
        }

        return view('konsultasi.pertanyaan', compact('pertanyaan'))->with('kode', 'K000');
    }

    // public function konsultasi(Request $request)
    // {

    //     // retrive data jawaban berdasarkan request
    //     $jawaban = Jawaban::findorfail($request->jawaban);

    //     $session = session();

    //     // cek tipe jawaban
    //     if ($jawaban->type == 'kategori') {

    //         // retrive data kategori berdasarkan representasi jawaban
    //         $kategori = Kategori::where('nama_kategori', $jawaban->representasi)->first();

    //         // temporary storage menggunakan session
    //         // cek ketersediaan session pertanyaan
    //         if ($session->has('pertanyaan') == null) {

    //             // retrive data pertanyaan berdasarkan kategori 
    //             $pertanyaan = Pertanyaan::where('kategori_id', $kategori->id)->first();

    //             // create session pertanyaan
    //             $session->put('pertanyaan', [$pertanyaan->id]);
    //             $session->put('kategori', $kategori->id);
    //             $session->put('pattern', '');
    //         } elseif ($session->has('pertanyaan')) {
    //         }
    //     } elseif ($jawaban->type == 'hukum') {

    //         // 
    //         $pertanyaan = Pertanyaan::where('kategori_id', $session->get('kategori'))
    //             ->whereNotIn('id', $session->get('pertanyaan'))
    //             ->get();

    //         if ($pertanyaan->isNotEmpty()) {
    //             $pertanyaan = $pertanyaan[0];
    //             $session->push('pertanyaan', $pertanyaan->id);
    //         } else {
    //             // Lakukan penanganan jika array kosong, misalnya mengembalikan pesan error atau melakukan tindakan alternatif

    //             $pattern = $session->get('pattern');

    //             return redirect()->route('get.surah')->with('pattern', $pattern);
    //         }
    //     } elseif ($jawaban->type == 'tanda') {

    //         // retrive data peryantaan yang belum ditampilkan
    //         $pertanyaan = Pertanyaan::where('kategori_id', $session->get('kategori'))
    //             ->whereNotIn('id', $session->get('pertanyaan'))
    //             ->get();

    //         if ($pertanyaan->isNotEmpty()) {
    //             $pertanyaan = $pertanyaan[0];

    //             // tambah id pertanyaan yang sudah dikeluarkan berdasarkan id
    //             $session->push('pertanyaan', $pertanyaan->id);

    //             // merge pattern dari session dan jawaban
    //             $pattern = $session->get('pattern') . $jawaban->representasi;
    //             $session->put('pattern', $pattern);
    //         } else {
    //             // Lakukan penanganan jika array kosong, misalnya mengembalikan pesan error atau melakukan tindakan alternatif
    //             $pattern = $session->get('pattern') . $jawaban->representasi;

    //             // simpan pattern baru
    //             $session->put('pattern', $pattern);

    //             $pattern = $session->get('pattern');

    //             return redirect()->route('get.surah')->with('pattern', $pattern);
    //         }
    //     }

    //     return view('konsultasi.pertanyaan', compact('pertanyaan'));
    // }

    public function konsultasi(Request $request)
    {
        $session = session();

        $kodeJawaban = $request->input('jawaban');

        if ($kodeJawaban[0] == 'K') {
            // cari kategori berdasarkan kode
            $kategori = Kategori::where('kode', $kodeJawaban)->first();
            $pertanyaan = Pertanyaan::where('reference', $request->input('reference'))->where('kategori_id', $kategori->id)->first();

            // menenentukan kode untuk tipe jawaban
            $kode = Tajwid::findorfail($pertanyaan->tajwid_id)->kode;
            
            // simpan data jawaban kategori di sesi
            $session->put('kategori', $kategori->id);
        } else {
            if ($kodeJawaban[0] == 'H') {
                $tajwid = Tajwid::where('kode', $kodeJawaban)->first();

                $pertanyaan = Pertanyaan::where('reference', $request->input('reference'))->where('kategori_id', $tajwid->kategori_id)->where('tajwid_id', $tajwid->id)->first();

                // menenentukan kode untuk tipe jawaban
                $kode = Tajwid::findorfail($pertanyaan->tajwid_id)->kode;

                // simpan data jawaban tajwid di sesi
                $session->put('tajwid', $tajwid->id);
            } else {
                // dd($session->get('pertanyaan'), $session->get('jawaban'));
                if (!$session->has('pertanyaan')) {
                    // buat sesi ketika sesi pertanyaan kosong

                    $session->put('pertanyaan', [$request->input('reference')]);
                    $session->put('jawaban', [$request->input('jawaban')]);
                } else {
                    // tambahkan data sesi ketika sesi memiliki value

                    if (in_array($request->input('reference'), $session->get('pertanyaan'))) {
                        // aksi ketika pertanyaan sudah dijawab

                        $tempArr = $session->get('jawaban');
                        $index = array_search($request->input('reference'), $session->get('pertanyaan'));
                        $tempArr[$index] = $request->input('jawaban');
                        session(['jawaban' => $tempArr]);
                    } else {
                        // aksi ketika pertanyaan belum dijawab
                        $session->push('pertanyaan', $request->input('reference'));
                        $session->push('jawaban', $request->input('jawaban'));
                    }
                }

                if ($request->input('lastQuestion')) {
                    return redirect()->route('get.surah');
                }

                // ambil data tajwid berdasarkan kode tajwid yang dikirim pertanyaan sebelumnya
                $tajwid = Tajwid::where('kode', $request->input('kode'))->first();

                // tanda tajwid
                $tanda = TandaTajwid::where('kode', $kodeJawaban)->first();

                $pertanyaan = Pertanyaan::where('reference', $request->input('reference'))->where('kategori_id', $tajwid->kategori_id)->where('tajwid_id', $tajwid->id)->first();

                // menenentukan kode untuk tipe jawaban
                $kode = Tajwid::findorfail($pertanyaan->tajwid_id)->kode;
            }
        }

        return view('konsultasi.pertanyaan', compact('pertanyaan', 'kode'));
    }

    public function hasil(Request $request)
    {

        // START: generate pattern
        $pattern = '';
        foreach (session()->get('jawaban') as $tanda) {
            $unicode = TandaTajwid::where('kode', $tanda)->first()->unicode;
            $pattern = $pattern . $unicode;
        }

        // cleaning string
        $pattern = preg_replace('/[-— ]/', '', $pattern);

        session()->put('pattern', $pattern);
        // END: generate pattern

        // Konversi text arab menjadi unicode
        // Mengambil nilai input dari objek $request dengan nama "valueText"
        $inputValue = $request->valueText;

        // Mengubah nilai input menjadi representasi JSON
        $jsonValue = json_encode($inputValue);

        // Mengganti semua urutan karakter "\uXXXX" dengan karakter Unicode yang sesuai
        $unicodeValue = preg_replace('/\\\\u([0-9a-fA-F]{4})/', '\\\\u$1', $jsonValue);

        // Menghapus tanda kutip ganda di awal dan akhir string
        $textValue = trim($unicodeValue, '"');

        $teks = '\u0646\u06e1&nbsp;\u0647';

        if (strpos($teks, '&nbsp;') !== false) {
            $teks = str_replace('&nbsp;', ' ', $teks);
        }

        // START: cek similariti pada role base

        $roleBase = RoleBase::all();
        $trueRoleBase = null;
        $trueTajwid = null;

        foreach ($roleBase as $item) {

            // cek jarak
            if ($this->dld($item->role, $pattern) == 0) {
                // aksi ketika jarak = 0 atau sama persis

                $trueRoleBase = $item;
            }
        }
        // END: cek similariti pada role base

        if ($trueRoleBase != null) {
            $trueTajwid = Tajwid::findorfail($trueRoleBase->id_tajwid);
        } else {
            return 'Role Base Tidak Tersedia';
        }

        return view('konsultasi.hasil', compact('trueRoleBase','trueTajwid'));
    }

    // Damerau–Levenshtein Distance
    public function dld($str1, $str2)
    {
        $len1 = strlen($str1);
        $len2 = strlen($str2);

        $dld = [];
        for ($i = 0; $i <= $len1; $i++) {
            $dld[$i] = [];
            $dld[$i][0] = $i;
        }
        for ($j = 0; $j <= $len2; $j++) {
            $dld[0][$j] = $j;
        }

        for ($i = 1; $i <= $len1; $i++) {
            for ($j = 1; $j <= $len2; $j++) {
                $cost = $str1[$i - 1] != $str2[$j - 1];
                $dld[$i][$j] = min(
                    $dld[$i - 1][$j] + 1,                  // Deletion
                    $dld[$i][$j - 1] + 1,                  // Insertion
                    $dld[$i - 1][$j - 1] + $cost           // Substitution
                );

                if ($i > 1 && $j > 1 && $str1[$i - 1] == $str2[$j - 2] && $str1[$i - 2] == $str2[$j - 1]) {
                    $dld[$i][$j] = min($dld[$i][$j], $dld[$i - 2][$j - 2] + $cost); // Transposition
                }
            }
        }

        return $dld[$len1][$len2];
    }
}

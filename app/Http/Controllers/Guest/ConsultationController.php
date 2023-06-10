<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Pertanyaan;
use App\Models\Kategori;
use App\Models\Tajwid;
use App\Models\TandaTajwid;
use App\Models\RoleBase;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\RequestException;
use App\Algorithms\KMP;
use App\Algorithms\DLD;


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

        // START: Request Data dari API

        try {
            $response = Http::get('https://api.alquran.cloud/v1/ayah/' . $request->input('valueSurah') . ':' . $request->input('valueAyah'));
            $response = $response->json();

            // Tangani masalah ketersediaan data
            if ($response['code'] == 200) {
                $ayah = $response['data']['text'];
                $ayahUnicode = trim(preg_replace('/\\\\u([0-9a-fA-F]{4})/', '\\\\u$1', json_encode($ayah)), '"');

                $coba = json_decode(json_encode('\u0671\u0644\u06e1\u062d\u064e\u0645\u06e1\u062f\u064f <tajwid>\u0644\u0650\u0644\u0651\u064e\u0647\u0650</tajwid> \u0631\u064e\u0628\u0651\u0650 \u0671\u0644\u06e1\u0639\u064e\u0640\u0670\u0644\u064e\u0645\u0650\u06cc\u0646\u064e\n'));
                // dd($ayahUnicode, $coba);

                // START: Cari Hukum Tajwid pada Ayat
                $text = '\u0671 \u0644\u06e1 \u0671';
                $pattern = '\u0671';

                $kmp = new KMP();
                $result = $kmp->kmpSearch($pattern, $text);

                if ($result != -1) {
                    return "Pola ditemukan pada indeks: " . implode(', ', $result);
                } else {
                    return "Pola tidak ditemukan dalam teks.";
                }
                // END: Cari Hukum Tajwid pada Ayat

            } else {
                return 'Data ayat tidak tersedia.';
            }
        } catch (RequestException $exception) {
            // Tangani kesalahan permintaan HTTP di sini

            if ($exception->getCode() === 404) {
                // Tangani kesalahan 404 (Not Found) di sini
                return response()->json(['error' => 'Data tidak ditemukan'], 404);
            } elseif ($exception->getCode() === 500) {
                // Tangani kesalahan 500 (Internal Server Error) di sini
                return response()->json(['error' => 'Terjadi kesalahan server'], 500);
            } else {
                // Tangani kesalahan umum di sini
                return response()->json(['error' => 'Gagal mengambil data dari API'], 500);
            }
        }

        // END: Request Data dari API       

        // START: cek similariti pada role base

        $roleBase = RoleBase::all();
        $trueRoleBase = null;
        $trueTajwid = null;
        $dld = new DLD;

        foreach ($roleBase as $item) {

            // cek jarak
            if ($dld->dldSimilarity($item->role, $pattern) == 0) {
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

        return view('konsultasi.hasil', compact('trueRoleBase', 'trueTajwid', 'ayahUnicode', 'coba'));
    }
}

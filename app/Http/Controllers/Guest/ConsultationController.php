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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Collection;


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

        // dd($session->get('kategori'), $session->get('tajwid'), $session->get('pertanyaan'), $session->get('jawaban'), $session->get('pattern'));

        $kodeJawaban = $request->input('jawaban');

        if ($kodeJawaban[0] == 'K') {
            // cari kategori berdasarkan kode
            $kategori = Kategori::where('kode', $kodeJawaban)->first();
            $pertanyaan = Pertanyaan::where('reference', $request->input('reference'))->where('kategori_id', $kategori->id)->first();

            // menenentukan kode untuk tipe jawaban
            $kode = Tajwid::findorfail($pertanyaan->tajwid_id)->kode;

            // simpan data jawaban kategori di sesi
            if ($session->has('kategori')) {
                if ($session->get('kategori') == $kategori->id) {
                    $session->put('kategori', $kategori->id);
                } else {
                    $this->deleteSession('kategori');
                    $this->deleteSession('tajwid');
                    $this->deleteSession('pertanyaan');
                    $this->deleteSession('jawaban');
                    $this->deleteSession('pattern');

                    $session->put('kategori', $kategori->id);
                }
            } else {
                $session->put('kategori', $kategori->id);
            }
        } else {
            if ($kodeJawaban[0] == 'H') {
                $tajwid = Tajwid::where('kode', $kodeJawaban)->first();

                $pertanyaan = Pertanyaan::where('reference', $request->input('reference'))->where('kategori_id', $tajwid->kategori_id)->where('tajwid_id', $tajwid->id)->first();

                // menenentukan kode untuk tipe jawaban
                $kode = Tajwid::findorfail($pertanyaan->tajwid_id)->kode;

                // simpan data jawaban tajwid di sesi
                if ($session->has('tajwid')) {
                    if ($session->get('tajwid') == $tajwid->id) {
                        $session->put('tajwid', $tajwid->id);
                    } else {
                        $this->deleteSession('tajwid');
                        $this->deleteSession('pertanyaan');
                        $this->deleteSession('jawaban');
                        $this->deleteSession('pattern');

                        $session->put('tajwid', $tajwid->id);
                    }
                } else {
                    $session->put('tajwid', $tajwid->id);
                }
            } else {
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

                        // cek apakah jawaban sama
                        if ($tempArr[$index] == $request->input('jawaban')) {
                            // aksi ketika jawaban sama
                        } else {
                            // aksi ketika jawaban tidak sama
                            $tempArr[$index] = $request->input('jawaban');
                            session(['jawaban' => $tempArr]);

                            // hapus pattern jika jawaban tidak sama
                            $this->deleteSession('pattern');
                        }
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

        session()->put('pattern', $pattern);
        // END: generate pattern

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

        // START: Request Data dari API
        try {
            $response = Http::get('https://api.alquran.cloud/v1/ayah/' . $request->input('valueSurah') . ':' . $request->input('valueAyah'));
            $response = $response->json();

            // Tangani masalah ketersediaan data
            if ($response['code'] == 200) {

                // START: Cari Hukum Tajwid pada Ayat
                $kmp = new KMP();

                $ayah = $response['data']['text'];
                $ayahUnicode = trim(preg_replace('/\\\\u([0-9a-fA-F]{4})/', '\\\\u$1', json_encode($ayah)), '"');
                $ayahUnicode = preg_replace('/\s/', '\\\\u0020', $ayahUnicode);

                // dd($ayahUnicode);

                $resultRole = $kmp->kmpSearch($trueRoleBase->role, $ayahUnicode);
                $resultSecondRole = $kmp->kmpSearch($trueRoleBase->second_role, $ayahUnicode);


                // ambil data rolebase yang memiliki hukum tajwid sama dengan role base terpilih
                $RoleBasetajwidSejenis = RoleBase::where('id_tajwid', $trueTajwid->id)->get();

                if (!$RoleBasetajwidSejenis->isEmpty()) {
                    foreach ($RoleBasetajwidSejenis as $dataRB) {
                        if ($dataRB->id == $trueRoleBase->id) {
                            $countIndex = 0;
                            if (!empty($resultRole)) {

                                foreach ($resultRole as $indexResult) {

                                    // Pisahkan string
                                    $firstPattern = substr($ayahUnicode, 0, $indexResult + $countIndex);
                                    $midPattern = substr($ayahUnicode, $indexResult + $countIndex, strlen($trueRoleBase->role));
                                    $lastPattern = substr($ayahUnicode, $indexResult + $countIndex + strlen($trueRoleBase->role), strlen($ayahUnicode) + $countIndex - 1);

                                    // tambah tag pada unicode yang ditemukan
                                    $lengMidPattern = strlen($midPattern);
                                    $midPattern = "<tajwid>" . $midPattern . "</tajwid>";
                                    $countIndex = $countIndex + (strlen($midPattern) - $lengMidPattern);

                                    // gabungkan string
                                    $ayahUnicode = $firstPattern . $midPattern . $lastPattern;
                                }
                            } else {
                                // return "Pola tidak ditemukan dalam teks.";
                            }

                            // cek apakah ada nilai pada second role
                            $countIndex = 0;
                            if (!empty($resultSecondRole)) {
                                foreach ($resultSecondRole as $indexResult) {

                                    // Pisahkan string
                                    $firstPattern = substr($ayahUnicode, 0, $indexResult + $countIndex);
                                    $midPattern = substr($ayahUnicode, $indexResult + $countIndex, strlen($trueRoleBase->second_role));
                                    $lastPattern = substr($ayahUnicode, $indexResult + $countIndex + strlen($trueRoleBase->second_role), strlen($ayahUnicode) + $countIndex - 1);

                                    // tambah tag pada unicode yang ditemukan
                                    $lengMidPattern = strlen($midPattern);
                                    $midPattern = "<tajwid>" . $midPattern . "</tajwid>";
                                    $countIndex = $countIndex + (strlen($midPattern) - $lengMidPattern);

                                    // gabungkan string
                                    $ayahUnicode = $firstPattern . $midPattern . $lastPattern;
                                }
                            } else {
                                // jika pola tidak ditemukan
                            }
                        } else {
                            // aksi role base tajwid sejenis

                            $resultRB = $kmp->kmpSearch($dataRB->role, $ayahUnicode);
                            $resultSecondRB = $kmp->kmpSearch($dataRB->second_role, $ayahUnicode);

                            $countIndex = 0;
                            if (!empty($dataRB)) {

                                foreach ($resultRB as $indexResult) {

                                    // Pisahkan string
                                    $firstPattern = substr($ayahUnicode, 0, $indexResult + $countIndex);
                                    $midPattern = substr($ayahUnicode, $indexResult + $countIndex, strlen($dataRB->role));
                                    $lastPattern = substr($ayahUnicode, $indexResult + $countIndex + strlen($dataRB->role), strlen($ayahUnicode) + $countIndex - 1);

                                    // tambah tag pada unicode yang ditemukan
                                    $lengMidPattern = strlen($midPattern);
                                    $midPattern = "<tajwidSec>" . $midPattern . "</tajwidSec>";
                                    $countIndex = $countIndex + (strlen($midPattern) - $lengMidPattern);

                                    // gabungkan string
                                    $ayahUnicode = $firstPattern . $midPattern . $lastPattern;
                                }
                            } else {
                                // return "Pola tidak ditemukan dalam teks.";
                            }

                            // cek apakah ada nilai pada second role
                            $countIndex = 0;
                            if ($dataRB->second_role != null) {
                                foreach ($resultSecondRB as $indexResult) {

                                    // Pisahkan string
                                    $firstPattern = substr($ayahUnicode, 0, $indexResult + $countIndex);
                                    $midPattern = substr($ayahUnicode, $indexResult + $countIndex, strlen($dataRB->second_role));
                                    $lastPattern = substr($ayahUnicode, $indexResult + $countIndex + strlen($dataRB->second_role), strlen($ayahUnicode) + $countIndex - 1);

                                    // tambah tag pada unicode yang ditemukan
                                    $lengMidPattern = strlen($midPattern);
                                    $midPattern = "<tajwidSec>" . $midPattern . "</tajwidSec>";
                                    $countIndex = $countIndex + (strlen($midPattern) - $lengMidPattern);

                                    // gabungkan string
                                    $ayahUnicode = $firstPattern . $midPattern . $lastPattern;
                                }
                            } else {
                                // jika pola tidak ditemukan
                            }
                        }
                    }
                } else {
                }

                // bersikan karakter tidak perlu
                // $ayahUnicode = str_replace(['\\', 'n'], '', $ayahUnicode);

                // $out = html_entity_decode(preg_replace("/\\\\u([0-9A-F]{4})/i", "&#x$1;", $ayahUnicode), ENT_QUOTES, 'UTF-8');
                // dd($out, $ayahUnicode);

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


        return view('konsultasi.hasil', compact('trueRoleBase', 'trueTajwid', 'ayahUnicode'));
    }

    public function deleteSession($key)
    {
        Session::forget($key);
    }

    public function reset()
    {
        $this->deleteSession('kategori');
        $this->deleteSession('tajwid');
        $this->deleteSession('pertanyaan');
        $this->deleteSession('jawaban');
        $this->deleteSession('pattern');

        return redirect('konsultasi')->with('message', 'Data konsultasi sebelumnya berhasil dibersihkan!');
    }
}

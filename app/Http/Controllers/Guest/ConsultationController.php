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

        // START: gabungkan unicode jawaban
        $pattern = '';
        foreach (session()->get('jawaban') as $tanda) {
            $unicode = TandaTajwid::where('kode', $tanda)->first()->unicode;
            $pattern = $pattern . $unicode;
        }

        session()->put('pattern', $pattern);
        // END: gabungkan unicode jawaban


        // START: cek similariti pada rule tajwid

        $roleBase = RoleBase::all();
        $trueRoleBase = null;
        $trueTajwid = null;
        $dld = new DLD;
        $countFound = 0;
        $countFoundKind = 0;

        foreach ($roleBase as $item) {

            // cek jarak
            if ($dld->dldSimilarity($item->role, $pattern) == 0) {
                // aksi ketika jarak = 0 atau sama persis

                $trueRoleBase = $item;
            }
        }
        // END: cek similariti pada rule tajwid

        if ($trueRoleBase != null) {
            $trueTajwid = Tajwid::findorfail($trueRoleBase->id_tajwid);
            $ruleEmpty = false;
        } else {
            $ruleEmpty = true;
            return view('konsultasi.hasil', compact('ruleEmpty'));
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

                // ambil data synonym dari rule yang terpilih
                $synonymRuleTajwid = RoleBase::where('synonym', $trueRoleBase->kode)->get();


                // ambil data rulebase yang memiliki hukum tajwid sama dengan rulebase terpilih dan bukan synonym dari rule tajwid yang lain
                $RuleTajwidSejenis = RoleBase::where('id_tajwid', $trueTajwid->id)->where('synonym', null)->get();

                if (!$RuleTajwidSejenis->isEmpty()) {

                    foreach ($RuleTajwidSejenis as $dataRB) {
                        // cari index rule
                        $resultRole = $kmp->kmpSearch($trueRoleBase->role, $ayahUnicode);



                        if ($dataRB->id == $trueRoleBase->id) {
                            // cara hukum bacaan dengan rule pertama
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

                                    // counter ditemukan
                                    $countFound++;
                                }
                            } else {
                                // return "Pola tidak ditemukan dalam teks.";
                            }

                            // cari index rule kedua
                            if ($trueRoleBase->second_role != null) {
                                $resultSecondRole = $kmp->kmpSearch($trueRoleBase->second_role, $ayahUnicode);
                            }

                            // cari hukum bacaan dengan second rule
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

                                    // counter ditemukan
                                    $countFound++;
                                }
                            } else {
                                // jika pola tidak ditemukan
                            }

                            // cari hukum bacaan dengan synonym
                            if (!$synonymRuleTajwid->isEmpty()) {

                                foreach ($synonymRuleTajwid as $synonym) {
                                    // cari index rule synonym pada kumpulan unicode ayat
                                    $resultRS = $kmp->kmpSearch($synonym->role, $ayahUnicode);

                                    // cari hukum bacaan dengan rule pertama synonym
                                    $countIndex = 0;
                                    if (!empty($resultRS)) {
                                        foreach ($resultRS as $indexResult) {

                                            // Pisahkan string
                                            $firstPattern = substr($ayahUnicode, 0, $indexResult + $countIndex);
                                            $midPattern = substr($ayahUnicode, $indexResult + $countIndex, strlen($synonym->role));
                                            $lastPattern = substr($ayahUnicode, $indexResult + $countIndex + strlen($synonym->role), strlen($ayahUnicode) + $countIndex - 1);

                                            // tambah tag pada unicode yang ditemukan
                                            $lengMidPattern = strlen($midPattern);
                                            $midPattern = "<tajwid>" . $midPattern . "</tajwid>";
                                            $countIndex = $countIndex + (strlen($midPattern) - $lengMidPattern);

                                            // gabungkan string
                                            $ayahUnicode = $firstPattern . $midPattern . $lastPattern;

                                            // counter ditemukan
                                            $countFound++;
                                        }
                                    } else {
                                        // return jika hukum tidak ada
                                    }

                                    // cari index rulu synonym kedua pada kumpulan unicode ayat
                                    if ($synonym->second_role != null) {
                                        $resultSecondRS = $kmp->kmpSearch($synonym->second_role, $ayahUnicode);
                                    }

                                    // cari hukum bacaan dengan rule kedua synonym
                                    $countIndex = 0;
                                    if ($synonym->second_role != null) {
                                        if (!empty($resultSecondRS)) {
                                            foreach ($resultSecondRS as $indexResult) {

                                                // Pisahkan string
                                                $firstPattern = substr($ayahUnicode, 0, $indexResult + $countIndex);
                                                $midPattern = substr($ayahUnicode, $indexResult + $countIndex, strlen($synonym->second_role));
                                                $lastPattern = substr($ayahUnicode, $indexResult + $countIndex + strlen($synonym->second_role), strlen($ayahUnicode) + $countIndex - 1);

                                                // tambah tag pada unicode yang ditemukan
                                                $lengMidPattern = strlen($midPattern);
                                                $midPattern = "<tajwid>" . $midPattern . "</tajwid>";
                                                $countIndex = $countIndex + (strlen($midPattern) - $lengMidPattern);

                                                // gabungkan string
                                                $ayahUnicode = $firstPattern . $midPattern . $lastPattern;

                                                // counter ditemukan
                                                $countFound++;
                                            }
                                        } else {
                                            // return ketika hukum bacaan tidak ditemukan
                                        }
                                    }
                                }
                            } else {
                                // return jika synonym tidak ada
                            }
                        } else {
                            // aksi role base tajwid sejenis

                            $resultRB = $kmp->kmpSearch($dataRB->role, $ayahUnicode);
                            if ($dataRB->second_role != null) {
                                $resultSecondRB = $kmp->kmpSearch($dataRB->second_role, $ayahUnicode);
                            }

                            // cari sinonim rule tajwid sejenis
                            $synonymRuleTajwidSejenis = RoleBase::where('synonym', $dataRB->kode)->get();

                            $countIndex = 0;
                            if (!empty($resultRB)) {
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

                                    // counter ditemukan
                                    $countFoundKind++;
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

                                    // counter ditemukan
                                    $countFoundKind++;
                                }
                            } else {
                                // jika pola tidak ditemukan
                            }

                            // cari hukum bacaan dengan synonym
                            if (!$synonymRuleTajwidSejenis->isEmpty()) {

                                foreach ($synonymRuleTajwidSejenis as $synonym) {
                                    // cari index rule synonym pada kumpulan unicode ayat
                                    $resultRTSejenis = $kmp->kmpSearch($synonym->role, $ayahUnicode);



                                    // cari hukum bacaan dengan rule pertama synonym
                                    $countIndex = 0;
                                    if (!empty($resultRTSejenis)) {

                                        foreach ($resultRTSejenis as $indexResult) {

                                            // Pisahkan string
                                            $firstPattern = substr($ayahUnicode, 0, $indexResult + $countIndex);
                                            $midPattern = substr($ayahUnicode, $indexResult + $countIndex, strlen($synonym->role));
                                            $lastPattern = substr($ayahUnicode, $indexResult + $countIndex + strlen($synonym->role), strlen($ayahUnicode) + $countIndex - 1);

                                            // tambah tag pada unicode yang ditemukan
                                            $lengMidPattern = strlen($midPattern);
                                            $midPattern = "<tajwidSec>" . $midPattern . "</tajwidSec>";
                                            $countIndex = $countIndex + (strlen($midPattern) - $lengMidPattern);

                                            // gabungkan string
                                            $ayahUnicode = $firstPattern . $midPattern . $lastPattern;

                                            // counter ditemukan
                                            $countFoundKind++;
                                        }
                                    } else {
                                        // return jika hukum tidak ada
                                    }

                                    // cari index rulu synonym kedua pada kumpulan unicode ayat
                                    if ($synonym->second_role != null) {
                                        $resultSecondRTSejenis = $kmp->kmpSearch($synonym->second_role, $ayahUnicode);
                                    }

                                    // cari hukum bacaan dengan rule kedua synonym
                                    $countIndex = 0;
                                    if ($synonym->second_role != null) {
                                        if (!empty($resultSecondRTSejenis)) {
                                            foreach ($resultSecondRTSejenis as $indexResult) {

                                                // Pisahkan string
                                                $firstPattern = substr($ayahUnicode, 0, $indexResult + $countIndex);
                                                $midPattern = substr($ayahUnicode, $indexResult + $countIndex, strlen($synonym->second_role));
                                                $lastPattern = substr($ayahUnicode, $indexResult + $countIndex + strlen($synonym->second_role), strlen($ayahUnicode) + $countIndex - 1);

                                                // tambah tag pada unicode yang ditemukan
                                                $lengMidPattern = strlen($midPattern);
                                                $midPattern = "<tajwidSec>" . $midPattern . "</tajwidSec>";
                                                $countIndex = $countIndex + (strlen($midPattern) - $lengMidPattern);

                                                // gabungkan string
                                                $ayahUnicode = $firstPattern . $midPattern . $lastPattern;

                                                // counter ditemukan
                                                $countFoundKind++;
                                            }
                                        } else {
                                            // return ketika hukum bacaan tidak ditemukan
                                        }
                                    }
                                }
                            } else {
                                // return jika synonym tidak ada
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

            // data surah
            $dataSurah = Http::get('http://api.alquran.cloud/v1/meta');
            $dataSurah = $dataSurah->json();
            $dataSurah = $dataSurah['data']['surahs']['references'][$request->input('valueSurah')-1];

            // nomor ayah
            $numberAyah = $request->input('valueAyah');

            // Audio
            $sourceAudio = Http::get('https://api.alquran.cloud/v1/surah/' . $request->input('valueSurah') . '/ar.alafasy');
            $sourceAudio = $sourceAudio->json();
            $sourceAudio = $sourceAudio['data']['ayahs'][$request->input('valueAyah') - 1]['audio'];


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


        return view('konsultasi.hasil', compact('trueRoleBase', 'trueTajwid', 'ayahUnicode', 'ruleEmpty', 'sourceAudio', 'dataSurah', 'numberAyah', 'countFound', 'countFoundKind'));
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

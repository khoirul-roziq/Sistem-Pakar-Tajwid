<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ConsultationController extends Controller
{
    public function index()
    {
        return view('guest.hukum-bacaan.index');
    }

    public function ghunnahView(string $page)
    {
        // bersihkan session pattern ketika halaman 1
        if ($page == '1') {
            session()->forget('pattern');
        }

        return view('guest.hukum-bacaan.ghunnah.' . $page);
    }

    public function ghunnah(Request $request, string $page)
    {


        // deklarasi variable unicode
        $unicode = '';

        if (session()->has('pattern')) {
            // jika session pattern memiliki value
            $unicode = session()->get('pattern') . $request->input('unicode');

            // simpan unicode baru ke session pattern
            session()->put('pattern', $unicode);
        } else {
            // jika session pattern null
            $unicode = $request->input('unicode');
            session()->put('pattern', $unicode);
        }

        if ($page == "penjelasan") {
            // kembali ke halaman 1 ketika pattern halaman penjelasan tidak memnuhi kriteria (<= 6)
            if(Str::length(session()->get('pattern')) <= 6) {
                return redirect('ghunnah/1');
            }
            // bersihkan session ketika halaman penjelasan
            session()->forget('pattern');
        } else {
            if ($page !== '1') {
                // var1 untuk menyimpan kriteria panjang pattern setiap halaman
                $var1 = ($page - 1) * 6;

                // var2 untuk menyimpan panjjang pattern pada session
                $var2 = Str::length(session()->get('pattern'));

                // jika kriteria panjang pattern pada halaman dan panjang pattern pada session tidak sama
                if (($var1 !== $var2)) {
                    // hapus session pattern
                    session()->forget('pattern');
                    // direct ke halaman 1 ghunnah
                    return redirect('ghunnah/1');
                }
            }
        }

        return view('guest.hukum-bacaan.ghunnah.' . $page, compact('unicode'));
    }
}

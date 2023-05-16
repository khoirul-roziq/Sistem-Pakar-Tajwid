<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RetriveAlQuranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getSurah(string $pattern = null)
    {
        $session = session();
        $client = new Client();
        $response = $client->get('http://api.alquran.cloud/v1/meta');
        $data = json_decode($response->getBody(), true);

        $surahs = $data['data']['surahs']['references'];
        $pattern = $session->get('pattern');
        
        return view('konsultasi.pilih-surah', compact('surahs','pattern'));
    }

    public function getAyah(Request $request)
    {
        $client = new Client();
        $response = $client->get('http://api.alquran.cloud/v1/meta');
        $data = json_decode($response->getBody(), true);

        $referenceSurah = $request->input('surah')-1;
        $dataSurah = $data['data']['surahs']['references'][$referenceSurah];

        $pattern = $request->input('pattern');

        return view('konsultasi.pilih-ayah', compact('dataSurah', 'pattern'));
    }
}

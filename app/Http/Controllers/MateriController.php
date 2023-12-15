<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Tajwid;
use GuzzleHttp\Client;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all()->slice(1);
        $tajwid = Tajwid::all();

        $session = session();
        $client = new Client();
        $response = $client->get('http://api.alquran.cloud/v1/meta');
        $data = json_decode($response->getBody(), true);

        $surahs = $data['data']['surahs']['references'];

        if(Auth::user()->role == 'admin') {
            return view('materi.admin.index', compact('kategori', 'tajwid', 'surahs'));
        } else {
            return view('materi.guest.index', compact('kategori', 'tajwid', 'surahs'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

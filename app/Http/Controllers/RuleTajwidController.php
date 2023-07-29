<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RuleTajwid;
use App\Models\Tajwid;
use App\Models\TandaTajwid;

class RuleTajwidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = RuleTajwid::all();
        // unicode to arabic
        // $str1 = '\u0671\u0644\u0644\u0651\u064e\u0647\u064f'; // string unicode
        // $str1 = json_decode('"' . $str1 . '"'); // convert unicode to string
        // $str1 = html_entity_decode($str1, ENT_QUOTES, 'UTF-8'); // decode HTML entities

        return view('admin.rule-tajwid.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menghitung jumlah data rule tajwid
        $countRuleTajwid = RuleTajwid::all()->count();

        // Buat kode RuleTajwid baru
        $newKodeRuleTajwid = '';

        if($countRuleTajwid < 9 ) {
            $newKodeRuleTajwid = 'R00'. $countRuleTajwid+1;
        } elseif ($countRuleTajwid < 99) {
            $newKodeRuleTajwid = 'R0'. $countRuleTajwid+1;
        } elseif($countRuleTajwid < 999) {
            $newKodeRuleTajwid = 'R'. $countRuleTajwid+1;
        } else {
            $newKodeRuleTajwid = 'R'. $countRuleTajwid+1;
        }

        $data = Tajwid::all();
        $tandaTajwid = TandaTajwid::all();
        $ruleTajwid = RuleTajwid::all();

        return view('admin.rule-tajwid.create', compact('data', 'tandaTajwid', 'newKodeRuleTajwid', 'ruleTajwid'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // START: Generate Second Rule
        if($request->input('second-rule') == null) {
            $secondRule = null;
        } else {
            if(strlen($request->input('rule')) >= 6){
                // ambil unicode terakhir
                $lastUnicode = substr($request->input('rule'), -6);
                
                // generate second Rule
                $secondRule = str_replace($lastUnicode, '\u0020'.$lastUnicode, $request->input('rule'));
                
            } else {
                return 'Rule Tajwid Invalid';
            }
        }
        // END: Generate Second Rule

        $data = RuleTajwid::create([
            'kode' => $request->kode,
            'id_tajwid' => $request->tajwid,
            'rule' => $request->rule,
            'second_rule' => $secondRule,
            'keterangan' => $request->keterangan,
            'synonym' => $request->synonym
        ]);

        $data->tandaTajwid()->sync($request->tandaTajwid);

        return redirect('rule-tajwid')->with('message', 'Berhasil menambahkan rule tajwid!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.rule-tajwid.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Tajwid::all();
        $tandaTajwid = TandaTajwid::all();
        $ruleTajwid = RuleTajwid::findorfail($id);
        $dataRuleTajwid = RuleTajwid::all();

        return view('admin.rule-tajwid.edit', compact('data', 'tandaTajwid', 'ruleTajwid', 'dataRuleTajwid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // START: Generate Second Rule
        if($request->input('second-rule') == null) {
            $secondRule = null;
        } else {
            if(strlen($request->input('rule')) >= 6){
                // ambil unicode terakhir
                $lastUnicode = substr($request->input('rule'), -6);
                
                // generate second Rule
                $secondRule = str_replace($lastUnicode, '\u0020'.$lastUnicode, $request->input('rule'));
                
            } else {
                return 'Rule Tajwid Invalid';
            }
        }
        // END: Generate Second Rule

        $ruleTajwid = RuleTajwid::findOrFail($id);

        $ruleTajwid->kode = $request->kode;
        $ruleTajwid->id_tajwid = $request->tajwid;
        $ruleTajwid->rule = $request->rule;
        $ruleTajwid->second_rule = $secondRule;
        $ruleTajwid->keterangan = $request->keterangan;
        $ruleTajwid->synonym = $request->synonym;
        
        $ruleTajwid->save();
    
        $ruleTajwid->tandaTajwid()->sync($request->tandaTajwid);
        
        return redirect('rule-tajwid')->with('message', 'Berhasil mengubah data rule tajwid!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = RuleTajwid::findorfail($id)->delete();
        return redirect('rule-tajwid')->with('message', 'Berhasil menghapus data rule tajwid!');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SugarLevels;
use Illuminate\Http\Request;

class SugarLevel extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sugar.index', ['title'   => 'Ukur Kadar Gula Darah']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all() + [
            'datetime'  => time()
        ];

        SugarLevels::create($data);

        return redirect()->to('/sugar')->with([
            'status'    => 200,
            'message'   => 'Berhasil Disimpan'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SugarLevels  $sugarLevels
     * @return \Illuminate\Http\Response
     */
    public function showAll(Request $request)
    {
        $sugarLevels = SugarLevels::select()->limit(100);

        if (!is_null($request->s)) $sugarLevels->where('patient_name', 'like', "%{$request->s}%");

        $data = [
            'sugarLevels'   => $sugarLevels->get(),
            'title'         => 'Data Pasien | Kadar Gula Darah'
        ];

        return view('sugar.all', $data);
    }
}

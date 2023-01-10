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
        return view('sugar.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 
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
    public function showAll()
    {
        $data = [
            'sugarLevels'   => SugarLevels::all()
        ];

        return view('sugar.all', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SugarLevels  $sugarLevels
     * @return \Illuminate\Http\Response
     */
    public function edit(SugarLevels $sugarLevels)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SugarLevels  $sugarLevels
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SugarLevels $sugarLevels)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SugarLevels  $sugarLevels
     * @return \Illuminate\Http\Response
     */
    public function destroy(SugarLevels $sugarLevels)
    {
        //
    }
}

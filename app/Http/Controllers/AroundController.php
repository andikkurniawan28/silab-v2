<?php

namespace App\Http\Controllers;

use App\Models\Around;
use App\Models\Log;
use Illuminate\Http\Request;

class AroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arounds = Around::limit(1000)->get();
        return view('around.index', compact('arounds'));
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
        $request->request->add([
            'admin' => session('name'),
        ]);
        Around::create($request->all());
        Log::writeLog('Keliling', 'Create New Keliling', session('name'));
        return redirect()->back()->with('success', 'Keliling has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Around  $around
     * @return \Illuminate\Http\Response
     */
    public function show(Around $around)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Around  $around
     * @return \Illuminate\Http\Response
     */
    public function edit(Around $around)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Around  $around
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Around $around)
    {
        Around::where('id', $id)->update([
            'tek_pe1' => $request->tek_pe1,
            'tek_pe2' => $request->tek_pe2,
            'tek_evap1' => $request->tek_evap1,
            'tek_evap2' => $request->tek_evap2,
            'tek_evap3' => $request->tek_evap3,
            'tek_evap4' => $request->tek_evap4,
            'tek_evap5' => $request->tek_evap5,
            'tek_evap6' => $request->tek_evap6,
            'tek_evap7' => $request->tek_evap7,
            'tek_pan1' => $request->tek_pan1,
            'tek_pan2' => $request->tek_pan2,
            'tek_pan3' => $request->tek_pan3,
            'tek_pan4' => $request->tek_pan4,
            'tek_pan5' => $request->tek_pan5,
            'tek_pan6' => $request->tek_pan6,
            'tek_pan7' => $request->tek_pan7,
            'tek_pan8' => $request->tek_pan8,
            'tek_pan9' => $request->tek_pan9,
            'tek_pan10' => $request->tek_pan10,
            'tek_pan11' => $request->tek_pan11,
            'tek_pan12' => $request->tek_pan12,
            'tek_pan13' => $request->tek_pan13,
            'tek_pan14' => $request->tek_pan14,
            'tek_vakum' => $request->tek_vakum,
            'suhu_pe1' => $request->suhu_pe1,
            'suhu_pe2' => $request->suhu_pe2,
            'suhu_evap1' => $request->suhu_evap1,
            'suhu_evap2' => $request->suhu_evap2,
            'suhu_evap3' => $request->suhu_evap3,
            'suhu_evap4' => $request->suhu_evap4,
            'suhu_evap5' => $request->suhu_evap5,
            'suhu_evap6' => $request->suhu_evap6,
            'suhu_evap7' => $request->suhu_evap7,
            'suhu_heater1' => $request->suhu_heater1,
            'suhu_heater2' => $request->suhu_heater2,
            'suhu_heater3' => $request->suhu_heater3,
            'suhu_air_injeksi' => $request->suhu_air_injeksi,
            'suhu_air_terjun' => $request->suhu_air_terjun,
            'uap_baru' => $request->uap_baru,
            'uap_bekas' => $request->uap_bekas,
            'uap_3ato' => $request->uap_3ato,
        ]);
        Log::writeLog('Keliling', 'Edit Keliling', session('name'));
        return redirect()->back()->with('success', 'Keliling has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Around  $around
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Around::find($id)->delete();
        Log::writeLog('Keliling', 'Delete Keliling', session('name'));
        return redirect()->back()->with('success', 'Keliling has been deleted');
    }
}

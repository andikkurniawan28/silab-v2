<?php

namespace App\Http\Controllers;

use App\Models\Umum;
use App\Models\Sample;
use App\Models\Log;
use Illuminate\Http\Request;

class UmumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $umums = Umum::serveAll();
        $samples = Sample::serveAll();
        $stations = $this->serveStation();
        return view('umum.index', compact('umums', 'samples', 'stations'));
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
            'analyst' => Auth()->user()->name,
        ]);

        if(self::countId($request) == 0)
        {
            Umum::create($request->all());
            Log::writeLog('Analisa Umum', 'Submit Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Analisa Umum berhasil disimpan');
        }
        else
            return redirect()->back()->with('error', 'Error : Barcode '.$request->sample_id.' sudah masuk sistem, tidak boleh digunakan lagi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Umum  $umum
     * @return \Illuminate\Http\Response
     */
    public function show(Umum $umum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Umum  $umum
     * @return \Illuminate\Http\Response
     */
    public function edit(Umum $umum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Umum  $umum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Umum::find($id)->update([
            'sample_id' => $request->sample_id,
            'cao' => $request->cao,
            'ph' => $request->ph,
            'turbidity' => $request->turbidity,
            'temperature' => $request->temperature,
            'cao_origin' => $request->cao_origin,
            'ph_origin' => $request->ph_origin,
            'turbidity_origin' => $request->turbidity_origin,
            'temperature_origin' => $request->temperature_origin,
            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Analisa Umum', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Umum berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Umum  $umum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Umum::find($id)->delete();
        Log::writeLog('Analisa Umum', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Umum berhasil dihapus');
    }

    public function showCorrection()
    {
        $umums = Umum::serveCorrected();
        $stations = $this->serveStation();
        return view('umum.correction', compact('umums', 'stations'));
    }

    public function showVerification()
    {
        $umums = Umum::serveUnverificated();
        $stations = $this->serveStation();
        return view('umum.verification', compact('umums', 'stations'));
    }

    public function processVerification(Request $request)
    {
        if($request->checkAll == NULL) 
            return redirect()->back()->with('error', 'Error : Tidak ada data!');
        else 
        {
            $request->request->add([
                'master' => Auth()->user()->name,
            ]);
            Umum::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Analisa Umum', 'Verify Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Analisa Umum berhasil diverifikasi oleh '.$request->master);
        }
    }

    public function countId($request)
    {
        return Umum::where('sample_id', $request->sample_id)->count();
    }
}

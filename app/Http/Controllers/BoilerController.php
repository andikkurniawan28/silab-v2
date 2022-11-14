<?php

namespace App\Http\Controllers;

use App\Models\Boiler;
use App\Models\Sample;
use App\Models\Log;
use Illuminate\Http\Request;

class BoilerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boilers = Boiler::serveAll();
        $samples = Sample::serveAll();
        $stations = $this->serveStation();
        return view('boiler.index', compact('boilers', 'samples', 'stations'));
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
            Boiler::create($request->all());
            Log::writeLog('Analisa Ketel', 'Submit Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Analisa Ketel berhasil disimpan');
        }
        else
            return redirect()->back()->with('error', 'Error : Barcode '.$request->sample_id.' sudah masuk sistem, tidak boleh digunakan lagi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Boiler  $boiler
     * @return \Illuminate\Http\Response
     */
    public function show(Boiler $boiler)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Boiler  $boiler
     * @return \Illuminate\Http\Response
     */
    public function edit(Boiler $boiler)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Boiler  $boiler
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Boiler::find($id)->update([
            'sample_id' => $request->sample_id,
            'tds' => $request->tds,
            'ph' => $request->ph,
            'hardness' => $request->hardness,
            'phospate' => $request->phospate,
            'tds_origin' => $request->tds_origin,
            'ph_origin' => $request->ph_origin,
            'hardness_origin' => $request->hardness_origin,
            'phospate_origin' => $request->phospate_origin,
            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Analisa Ketel', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Ketel berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Boiler  $boiler
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Boiler::find($id)->delete();
        Log::writeLog('Analisa Ketel', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Ketel berhasil dihapus');
    }

    public function showCorrection()
    {
        $boilers = Boiler::serveCorrected();
        $stations = $this->serveStation();
        return view('boiler.correction', compact('boilers', 'stations'));
    }

    public function showVerification()
    {
        $boilers = Boiler::serveUnverificated();
        $stations = $this->serveStation();
        return view('boiler.verification', compact('boilers', 'stations'));
    }

    public function processVerification(Request $request)
    {
        if($request->checkAll == NULL) 
            return redirect()->back()->with('error', 'Error : No data to verified!');
        else 
        {
            $request->request->add([
                'master' => Auth()->user()->name,
            ]);
            Boiler::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Analisa Ketel', 'Verify Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Analisa Ketel berhasil diverifikasi oleh '.$request->master);
        }
    }

    public function countId($request)
    {
        return Boiler::where('sample_id', $request->sample_id)->count();
    }
}

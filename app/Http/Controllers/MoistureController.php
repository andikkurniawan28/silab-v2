<?php

namespace App\Http\Controllers;

use App\Models\Moisture;
use App\Models\Sample;
use App\Models\Log;
use Illuminate\Http\Request;

class MoistureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moistures = Moisture::serveAll();
        $samples = Sample::serveAll();
        $stations = $this->serveStation();
        return view('moisture.index', compact('moistures', 'samples', 'stations'));
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
        Moisture::create($request->all());
        Log::writeLog('Moisture', 'Submit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Moisture berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function show(Moisture $moisture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function edit(Moisture $moisture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Moisture::find($id)->update([
            'sample_id' => $request->sample_id,
            'moisture' => $request->moisture,
            'moisture_origin' => $request->moisture_origin,
            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Moisture', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Moisture berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Moisture::find($id)->delete();
        Log::writeLog('Moisture', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Moisture berhasil dihapus');
    }

    public function showCorrection()
    {
        $moistures = Moisture::serveCorrected();
        $stations = $this->serveStation();
        return view('moisture.correction', compact('moistures', 'stations'));
    }

    public function showVerification()
    {
        $moistures = Moisture::serveUnverificated();
        $stations = $this->serveStation();
        return view('moisture.verification', compact('moistures', 'stations'));
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
            Moisture::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Moisture', 'Verify Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Moisture berhasil diverifikasi oleh '.$request->master);
        }
    }
}

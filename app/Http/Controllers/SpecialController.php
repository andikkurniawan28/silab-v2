<?php

namespace App\Http\Controllers;

use App\Models\Special;
use App\Models\Sample;
use App\Models\Log;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specials = Special::latest()->paginate(1000);
        $samples = Sample::all();
        $stations = $this->serveStation();
        return view('special.index', compact('specials', 'samples', 'stations'));
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
            Special::create($request->all());
            Log::writeLog('Analisa Khusus', 'Submit Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Analisa Khusus berhasil disimpan');
        }
        else
            return redirect()->back()->with('error', 'Error : Barcode '.$request->sample_id.' sudah masuk sistem, tidak boleh digunakan lagi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function show(Special $special)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function edit(Special $special)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Special::find($id)->update([
            'sample_id' => $request->sample_id,

            'tsai' => $request->tsai,
            'glucose' => $request->glucose,
            'fructose' => $request->fructose,
            'sucrose' => $request->sucrose,
            'preparation_index' => $request->preparation_index,
            'fiber' => $request->fiber,
            'calcium' => $request->calcium,
            'optical_density' => $request->optical_density,
            'sugar_reducted' => $request->sugar_reducted,

            'tsai_origin' => $request->tsai_origin,
            'glucose_origin' => $request->glucose_origin,
            'fructose_origin' => $request->fructose_origin,
            'sucrose_origin' => $request->sucrose_origin,
            'preparation_index_origin' => $request->preparation_index_origin,
            'fiber_origin' => $request->fiber_origin,
            'calcium_origin' => $request->calcium_origin,
            'optical_density_origin' => $request->optical_density_origin,
            'sugar_reducted_origin' => $request->sugar_reducted_origin,

            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Analisa Khusus', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Khusus berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Special  $special
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Special::find($id)->delete();
        Log::writeLog('Analisa Khusus', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Khusus berhasil dihapus');
    }

    public function showCorrection()
    {
        $specials = Special::serveCorrected();
        $stations = $this->serveStation();
        return view('special.correction', compact('specials', 'stations'));
    }

    public function showVerification()
    {
        $specials = Special::serveUnverificated();
        $stations = $this->serveStation();
        return view('special.verification', compact('specials', 'stations'));
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
            Special::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Analisa Khusus', 'Verify Data', Auth()->user()->name);
            return redirect()->route('specials.index')->with('success', 'Analisa Khusus berhasil diverifikasi oleh '.$request->master);
        }
    }

    public function countId($request)
    {
        return Special::where('sample_id', $request->sample_id)->count();
    }
}

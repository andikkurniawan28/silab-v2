<?php

namespace App\Http\Controllers;

use App\Models\Sugar;
use App\Models\Sample;
use App\Models\Log;
use Illuminate\Http\Request;

class SugarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sugars = Sugar::serveAll();
        $samples = Sample::serveAll();
        $stations = $this->serveStation();
        return view('sugar.index', compact('sugars', 'samples', 'stations'));
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
        Sugar::create($request->all());
        Log::writeLog('Sugar', 'Submit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Gula has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sugar  $sugar
     * @return \Illuminate\Http\Response
     */
    public function show(Sugar $sugar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sugar  $sugar
     * @return \Illuminate\Http\Response
     */
    public function edit(Sugar $sugar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sugar  $sugar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Sugar::find($id)->update([
            'sample_id' => $request->sample_id,
            'sulphur' => $request->sulphur,
            'diameter' => $request->diameter,
            'blackspot' => $request->blackspot,
            'sulphur_origin' => $request->sulphur_origin,
            'diameter_origin' => $request->diameter_origin,
            'blackspot_origin' => $request->blackspot_origin,
            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Sugar', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Gula has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sugar  $sugar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sugar::find($id)->delete();
        Log::writeLog('Sugar', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Gula has been deleted');
    }

    public function showCorrection()
    {
        $sugars = Sugar::serveCorrected();
        $stations = $this->serveStation();
        return view('sugar.correction', compact('sugars', 'stations'));
    }

    public function showVerification()
    {
        $sugars = Sugar::serveUnverificated();
        $stations = $this->serveStation();
        return view('sugar.verification', compact('sugars', 'stations'));
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
            Sugar::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Sugar', 'Verify Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Analisa Gula has been verified by '.$request->master);
        }
    }
}

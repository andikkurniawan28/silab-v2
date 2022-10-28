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
        return view('umum.index', compact('umums', 'samples'));
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
            'analyst' => session('name'),
        ]);
        Umum::create($request->all());
        Log::writeLog('Umum', 'Submit Data', session('name'));
        return redirect()->back()->with('success', 'Analisa Umum has been stored');
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
            'corrector' => session('name'),
            'correction' => 1,
        ]);
        Log::writeLog('Umum', 'Edit Data', session('name'));
        return redirect()->back()->with('success', 'Analisa Umum has been updated');
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
        Log::writeLog('Umum', 'Delete Data', session('name'));
        return redirect()->back()->with('success', 'Analisa Umum has been deleted');
    }

    public function showCorrection()
    {
        $umums = Umum::serveCorrected();
        return view('umum.correction', compact('umums'));
    }

    public function showVerification()
    {
        $umums = Umum::serveUnverificated();
        return view('umum.verification', compact('umums'));
    }

    public function processVerification(Request $request)
    {
        if($request->checkAll == NULL) 
            return redirect()->back()->with('error', 'Error : No data to verified!');
        else 
        {
            $request->request->add([
                'master' => session('name'),
            ]);
            Umum::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Umum', 'Verify Data', session('name'));
            return redirect()->back()->with('success', 'Analisa Umum has been verified by '.$request->master);
        }
    }
}

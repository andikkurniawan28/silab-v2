<?php

namespace App\Http\Controllers;

use App\Models\Baggase;
use App\Models\Sample;
use App\Models\Log;
use App\Models\Saccharomat;
use Illuminate\Http\Request;

class BaggaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $baggases = Baggase::serveAll();
        $samples = Sample::serveAll();
        $stations = $this->serveStation();
        return view('baggase.index', compact('baggases', 'samples', 'stations'));
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
        return self::handleRequest($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baggase  $baggase
     * @return \Illuminate\Http\Response
     */
    public function show(Baggase $baggase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baggase  $baggase
     * @return \Illuminate\Http\Response
     */
    public function edit(Baggase $baggase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Baggase  $baggase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Baggase::find($id)->update([
            'sample_id' => $request->sample_id,
            'corrected_pol' => $request->corrected_pol,
            'dry' => $request->dry,
            'water' => $request->water,
            'corrected_pol_origin' => $request->corrected_pol_origin,
            'dry_origin' => $request->dry_origin,
            'water_origin' => $request->water_origin,
            'corrector' => session('name'),
            'correction' => 1,
        ]);
        Log::writeLog('Baggase', 'Edit Data', session('name'));
        return redirect()->back()->with('success', 'Analisa Ampas has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baggase  $baggase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Baggase::find($id)->delete();
        Log::writeLog('Baggase', 'Delete Data', session('name'));
        return redirect()->back()->with('success', 'Analisa Ampas has been deleted');
    }

    public function showCorrection()
    {
        $baggases = Baggase::serveCorrected();
        $stations = $this->serveStation();
        return view('baggase.correction', compact('baggases', 'stations'));
    }

    public function showVerification()
    {
        $baggases = Baggase::serveUnverificated();
        $stations = $this->serveStation();
        return view('baggase.verification', compact('baggases', 'stations'));
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
            Baggase::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Baggase', 'Verify Data', session('name'));
            return redirect()->back()->with('success', 'Analisa Ampas has been verified by '.$request->master);
        }
    }

    public function validateRequest($sample_id)
    {
        return Sample::checkIfSampleIsAmpasOrBlotong($sample_id);
    }

    public function handleRequest($request)
    {   
        $station_id = Sample::checkSampleStation($request->sample_id);
        $find_pol = Saccharomat::findPolCount($request->sample_id);

        if($find_pol > 0)
        {
            if($station_id == 2)
            {
                $dry = $request->dry;
                $water = Baggase::countWater($request->dry);
                $pol = Saccharomat::findPolBySampleId($request->sample_id);
                $corrected_pol = Baggase::countPol($pol, $water);
            }
            elseif($station_id == 3)
            {
                $water = ((10-$request->dry)/10) * 100;
                $dry = ($request->dry*10);
                $corrected_pol = Saccharomat::where('sample_id', $request->sample_id)->get()->first()->pol;
            }
        }
        else return redirect()->back()->with('error', 'Error : Sample ID has not registered on Saccharomat');

        $request->request->add([
            'corrected_pol' => $corrected_pol,
            'dry' => $dry,
            'water' => $water,
            'analyst' => session('name'),
        ]);

        Baggase::create($request->all());
        Log::writeLog('Baggase', 'Submit Data', session('name'));
        return redirect()->back()->with('success', 'Analisa Ampas has been stored');
    }

    

}



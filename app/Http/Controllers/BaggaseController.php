<?php

namespace App\Http\Controllers;

use App\Models\Baggase;
use App\Models\Sample;
use App\Models\Log;
use App\Models\Saccharomat;
use Illuminate\Http\Request;

class BaggaseController extends Controller
{
    public function index()
    {
        $baggases = Baggase::serveAll();
        $samples = Sample::serveAll();
        $stations = $this->serveStation();
        return view('baggase.index', compact('baggases', 'samples', 'stations'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        if(self::countId($request) == 0)
            return self::handleRequest($request);
        else
            return redirect()->back()->with('error', 'Error : Barcode '.$request->sample_id.' sudah masuk sistem, tidak boleh digunakan lagi!');
    }

    public function show(Baggase $baggase)
    {
        //
    }

    public function edit(Baggase $baggase)
    {
        //
    }

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
            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Analisa Ampas', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Ampas berhasil diupdate');
    }

    public function destroy($id)
    {
        Baggase::find($id)->delete();
        Log::writeLog('Analisa Ampas', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Ampas berhasil dihapus');
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
            return redirect()->back()->with('error', 'Error : Tidak ada data!');
        else 
        {
            $request->request->add([
                'master' => Auth()->user()->name,
            ]);
            Baggase::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Analisa Ampas', 'Verify Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Analisa Ampas berhasil diverifikasi oleh '.$request->master);
        }
    }

    public function validateRequest($sample_id)
    {
        return Sample::checkIfSampleIsAmpasOrBlotong($sample_id);
    }

    public function handleRequest($request)
    {   
        if(Sample::where('id', $request->id)->count() == 0)
            return redirect()->back()->with('error', 'Error : Barcode tidak terdaftar!');

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
        else return redirect()->back()->with('error', 'Error : Barcode tidak ditemukan di database Saccharomat!');

        $request->request->add([
            'corrected_pol' => $corrected_pol,
            'dry' => $dry,
            'water' => $water,
            'analyst' => Auth()->user()->name,
        ]);

        Baggase::create($request->all());
        Log::writeLog('Analisa Ampas', 'Submit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Analisa Ampas berhasil disimpan');
    }

    public function countId($request)
    {
        return Baggase::where('sample_id', $request->sample_id)->count();
    }
}



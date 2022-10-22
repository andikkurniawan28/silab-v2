<?php

namespace App\Http\Controllers;

use App\Models\Saccharomat;
use App\Models\Sample;
use App\Models\Material;
use App\Models\Log;
use Illuminate\Http\Request;

class SaccharomatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saccharomats = Saccharomat::serveAll();
        $samples = Sample::serveAll();
        return view('saccharomat.index', compact('saccharomats', 'samples'));
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
        $error = self::validateRequest($request);
        if($error == 0)
        {
            $sampleIsNpp = Sample::checkIfSampleIsNpp($request->sample_id);
            $data = Saccharomat::implementFormula($sampleIsNpp, $request->percent_pol, $request->percent_brix, $request->pol);
            $request->request->add([
                'purity' => $data['purity'],
                'yield' => $data['yield'],
                'analyst' => session('name'),
            ]);
            Saccharomat::create($request->all());
            Log::writeLog('Saccharomat', 'Submit Data', session('name'));
            return redirect()->back()->with('success', 'Data has been stored');
        }
        else return self::showError($error);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Saccharomat  $saccharomat
     * @return \Illuminate\Http\Response
     */
    public function show(Saccharomat $saccharomat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Saccharomat  $saccharomat
     * @return \Illuminate\Http\Response
     */
    public function edit(Saccharomat $saccharomat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Saccharomat  $saccharomat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $error = self::validateRequest($request);
        if($error == 0 || $error == 3)
        {
            $sampleIsNpp = Sample::checkIfSampleIsNpp($request->sample_id);
            $data = Saccharomat::implementFormula($sampleIsNpp, $request->percent_pol, $request->percent_brix, $request->pol);
            $request->request->add([
                'purity' => $data['purity'],
                'yield' => $data['yield'],
                'corrector' => session('name'),
            ]);
            Saccharomat::where('id', $id)->update([
                'sample_id' => $request->sample_id,
                'percent_brix' => $request->percent_brix,
                'percent_pol' => $request->percent_pol,
                'pol' => $request->pol,
                'purity' => $request->purity,
                'yield' => $request->yield,
                'percent_brix_origin' => $request->percent_brix_origin,
                'percent_pol_origin' => $request->percent_pol_origin,
                'pol_origin' => $request->pol_origin,
                'purity_origin' => $request->purity_origin,
                'yield_origin' => $request->yield_origin,
                'corrector' => $request->corrector,
                'correction' => 1,
            ]);
            Log::writeLog('Saccharomat', 'Update Data', session('name'));
            return redirect()->back()->with('success', 'Data has been updated');
        }
        else return self::showError($error);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Saccharomat  $saccharomat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Saccharomat::where('id', $id)->delete();
        Log::writeLog('Saccharomat', 'Delete Data', session('name'));
        return redirect()->back()->with('success', 'Data has been deleted');
    }

    public function validateRequest($request)
    {
        if($request->percent_brix == '' && $request->pol == '' && $request->pol == '') return 1;
        elseif($request->percent_pol > $request->percent_brix) return 2;
        elseif(Saccharomat::where('sample_id', $request->sample_id)->count() > 0) return 3;
        else return 0;
    }

    public function showError($error)
    {
        switch($error)
        {
            case 1 : return redirect()->back()->with('error', 'Error : Data is blank. You have to fil at least 1 parameter!'); break;
            case 2 : return redirect()->back()->with('error', 'Error : % Brix > % Pol. Evaluate your data!'); break;
            case 3 : return redirect()->back()->with('error', 'Error : Sample ID is duplicated!'); break;
        }
    }

    public function showCorrection()
    {
        $saccharomats = Saccharomat::serveCorrected();
        return view('saccharomat.correction', compact('saccharomats'));
    }

    public function showVerification()
    {
        $saccharomats = Saccharomat::serveUnverificated();
        return view('saccharomat.verification', compact('saccharomats'));
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
            Saccharomat::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Saccharomat', 'Verify Data', session('name'));
            return redirect()->back()->with('success', 'Data has been verified by '.$request->master);
        }
    }
}

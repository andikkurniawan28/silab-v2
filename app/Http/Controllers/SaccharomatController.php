<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Factor;
use App\Models\Sample;
use App\Models\Material;
use App\Models\Saccharomat;
use Illuminate\Http\Request;

class SaccharomatController extends Controller
{
    public function index()
    {
        $saccharomats = Saccharomat::latest()->paginate(1000);
        $samples = Sample::all();
        $stations = $this->serveStation();
        $mollases_factor = Factor::findMollasesFactor();
        $yield_factor = Factor::findRendemenFactor();
        return view('saccharomat.index', compact('saccharomats', 'samples', 'stations', 'mollases_factor', 'yield_factor'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $error = self::validateRequest($request);
        return self::handleRequest($error, $request);
    }

    public function show(Saccharomat $saccharomat)
    {
        //
    }

    public function edit(Saccharomat $saccharomat)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $error = self::validateRequest($request);
        return self::handleRequestUpdate($error, $request, $id);
    }

    public function destroy($id)
    {
        return self::handleRequestDelete($id);
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
            case 1 : return redirect()->back()->with('error', 'Error : Data kosong, isi setidaknya 1 parameter!'); break;
            case 2 : return redirect()->back()->with('error', 'Error : % Brix > % Pol. Evaluasi data Anda!'); break;
            case 3 : return redirect()->back()->with('error', 'Error : Barcode tersebut sudah dianalisa!'); break;
        }
    }

    public function showCorrection()
    {
        $saccharomats = Saccharomat::serveCorrected();
        $stations = $this->serveStation();
        return view('saccharomat.correction', compact('saccharomats', 'stations'));
    }

    public function showVerification()
    {
        $saccharomats = Saccharomat::serveUnverificated();
        $stations = $this->serveStation();
        return view('saccharomat.verification', compact('saccharomats', 'stations'));
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
            Saccharomat::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Saccharomat', 'Verify Data', Auth()->user()->name);
            return redirect()->route('saccharomats.index')->with('success', 'Saccharomat berhasil diverifikasi oleh '.$request->master);
        }
    }

    public function handleRequest($error, $request)
    {
        if($error == 0)
        {
            $sampleIsNpp = Sample::checkIfSampleIsNpp($request->sample_id);
            $data = Saccharomat::implementFormula($sampleIsNpp, $request->percent_pol, $request->percent_brix, $request->pol);
            $request->request->add([
                'purity' => $data['purity'],
                'yield' => $data['yield'],
                'analyst' => Auth()->user()->name,
                'preparation1' => Auth()->user()->name,
                'preparation2' => Auth()->user()->name,
            ]);
            Saccharomat::create($request->all());
            Log::writeLog('Saccharomat', 'Submit Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Saccharomat berhasil disimpan');
        }
        else
            return self::showError($error);
    }

    public function handleRequestUpdate($error, $request, $id)
    {
        if($error == 0 || $error == 3)
        {
            $sampleIsNpp = Sample::checkIfSampleIsNpp($request->sample_id);
            $data = Saccharomat::implementFormula($sampleIsNpp, $request->percent_pol, $request->percent_brix, $request->pol);
            $request->request->add([
                'purity' => $data['purity'],
                'yield' => $data['yield'],
                'corrector' => Auth()->user()->name,
            ]);
            Saccharomat::whereId($id)->update([
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
            Log::writeLog('Saccharomat', 'Update Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Saccharomat berhasil diupdate');
        }
        else
            return self::showError($error);
    }

    public function handleRequestDelete($id)
    {
        Saccharomat::whereId($id)->delete();
        Log::writeLog('Saccharomat', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Saccharomat berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Coloromat;
use App\Models\Sample;
use App\Models\Log;
use Illuminate\Http\Request;

class ColoromatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coloromats = Coloromat::latest()->paginate(1000);
        $samples = Sample::all();
        $stations = $this->serveStation();
        return view('coloromat.index', compact('coloromats', 'samples', 'stations'));
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
            'preparation' => Auth()->user()->name,
        ]);

        if(self::countId($request) == 0)
        {
            Coloromat::create($request->all());
            Log::writeLog('Coloromat', 'Submit Data', Auth()->user()->name);
            return redirect()->back()->with('success', 'Coloromat berhasil disimpan');
        }
        else
            return redirect()->back()->with('error', 'Error : Barcode '.$request->sample_id.' sudah masuk sistem, tidak boleh digunakan lagi!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coloromat  $coloromat
     * @return \Illuminate\Http\Response
     */
    public function show(Coloromat $coloromat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coloromat  $coloromat
     * @return \Illuminate\Http\Response
     */
    public function edit(Coloromat $coloromat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coloromat  $coloromat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Coloromat::find($id)->update([
            'sample_id' => $request->sample_id,
            'icumsa' => $request->icumsa,
            'icumsa_origin' => $request->icumsa_origin,
            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Coloromat', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Coloromat berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coloromat  $coloromat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coloromat::find($id)->delete();
        Log::writeLog('Coloromat', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Coloromat berhasil dihapus');
    }

    public function showCorrection()
    {
        $coloromats = Coloromat::serveCorrected();
        $stations = $this->serveStation();
        return view('coloromat.correction', compact('coloromats', 'stations'));
    }

    public function showVerification()
    {
        $coloromats = Coloromat::serveUnverificated();
        $stations = $this->serveStation();
        return view('coloromat.verification', compact('coloromats', 'stations'));
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
            Coloromat::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Coloromat', 'Verify Data', Auth()->user()->name);
            return redirect()->route('coloromats.index')->with('success', 'Coloromat berhasil diverifikasi oleh '.$request->master);
        }
    }

    public function countId($request)
    {
        return Coloromat::where('sample_id', $request->sample_id)->count();
    }
}

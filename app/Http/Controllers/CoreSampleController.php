<?php

namespace App\Http\Controllers;

use App\Models\Core_sample;
use App\Models\Log;
use Illuminate\Http\Request;

class CoreSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $core_samples = Core_sample::latest()->paginate(500);
        $stations = $this->serveStation();
        return view('core_sample.index', compact('core_samples', 'stations'));
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
        $data = Core_sample::validateRequest($request);
        $request->request->add([
            'farmer' => $data['farmer'],
            'truck_number' => $data['truck_number'],
            'vehicle' => $data['vehicle'],
            'register' => $data['register'],
            'cooperative' => $data['cooperative'],
            'outpost' => $data['outpost'],
            'program' => $data['program'],
            'yield' => $data['yield'],
            'analyst' => Auth()->user()->name,
        ]);
        Core_sample::create($request->all());
        Log::writeLog('Core Sample', 'Submit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Core Sample berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Core_sample  $core_sample
     * @return \Illuminate\Http\Response
     */
    public function show(Core_sample $core_sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Core_sample  $core_sample
     * @return \Illuminate\Http\Response
     */
    public function edit(Core_sample $core_sample)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Core_sample  $core_sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Core_sample::validateRequest($request);
        $request->request->add([
            'farmer' => $data['farmer'],
            'truck_number' => $data['truck_number'],
            'vehicle' => $data['vehicle'],
            'register' => $data['register'],
            'cooperative' => $data['cooperative'],
            'outpost' => $data['outpost'],
            'program' => $data['program'],
            'yield' => $data['yield'],
        ]);
        Core_sample::whereId($id)->update([
            'barcode' => $request->barcode,
            'spot' => $request->spot,
            'batch' => $request->batch,
            'farmer' => $request->farmer,
            'truck_number' => $request->truck_number,
            'register' => $request->register,
            'vehicle' => $request->vehicle,
            'cooperative' => $request->cooperative,
            'outpost' => $request->outpost,
            'program' => $request->program,
            'percent_brix' => $request->percent_brix,
            'percent_pol' => $request->percent_pol,
            'yield' => $request->yield,
            'percent_brix_origin' => $request->percent_brix_origin,
            'percent_pol_origin' => $request->percent_pol_origin,
            'yield_origin' => $request->yield_origin,
            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Core Sample', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Core Sample berhasil dirubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Core_sample  $core_sample
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Core_sample::find($id)->delete();
        Log::writeLog('Core Sample', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Core Sample berhasi dihapus.');
    }

    public function showCorrection()
    {
        $core_samples = Core_sample::serveCorrected();
        $stations = $this->serveStation();
        return view('core_sample.correction', compact('core_samples', 'stations'));
    }
}

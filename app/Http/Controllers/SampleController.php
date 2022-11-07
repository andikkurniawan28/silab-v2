<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Material;
use App\Models\Log;
use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples = Sample::serveAll();
        $materials = Material::serveAll();
        $stations = $this->serveStation();
        return view('sample.index', compact('samples', 'materials', 'stations'));
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
        $foreignId = Material::where('id', $request->material_id)->select('station_id', 'method_id')->get()->first();

        $request->request->add([
            'station_id' => $foreignId->station_id,
            'method_id' => $foreignId->method_id,
            'admin' => Auth()->user()->name,
        ]);

        Sample::create($request->all());
        Log::writeLog('Sample', 'Create New Sample', Auth()->user()->name);
        return redirect()->back()->with('success', 'Sample has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function show(Sample $sample)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function edit(Sample $sample)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $foreignId = Material::where('id', $request->material_id)->select('station_id', 'method_id')->get()->first();
        Sample::where('id', $id)->update([
            'material_id' => $request->material_id,
            'station_id' => $foreignId->station_id,
            'method_id' => $foreignId->method_id,
        ]);
        Log::writeLog('Sample', 'Update Sample', Auth()->user()->name);
        return redirect()->back()->with('success', 'Sample has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sample  $sample
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sample::where('id', $id)->delete();
        Log::writeLog('Sample', 'Delete Sample', Auth()->user()->name);
        return redirect()->back()->with('success', 'Sample has been delete');
    }
}

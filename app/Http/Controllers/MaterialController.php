<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Station;
use App\Models\Method;
use App\Models\Log;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = Material::all();
        $stations = Station::all();
        $methods = Method::all();
        return view('material.index', compact('materials', 'stations', 'methods'));
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
            'admin' => Auth()->user()->name,
        ]);
        Material::create($request->all());
        Log::writeLog('Material', 'Create New Material', Auth()->user()->name);
        return redirect()->back()->with('success', 'Material '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function show(Material $material, $id)
    {
        $material = Material::where('id', $id)->get();
        return view('material.show', $material);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function edit(Material $material)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Material::where('id', $id)->update([
            'name' => $request->name,
            'station_id' => $request->station_id,
            'method_id' => $request->method_id,
        ]);
        Log::writeLog('Material', 'Edit Material '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'Material '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Material  $material
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Material::where('id', $id)->delete();
        Log::writeLog('Material', 'Delete Material', Auth()->user()->name);
        return redirect()->back()->with('success', 'Material berhasil dihapus');
    }
}

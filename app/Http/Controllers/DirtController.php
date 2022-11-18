<?php

namespace App\Http\Controllers;

use App\Models\Dirt;
use App\Models\Log;
use Illuminate\Http\Request;

class DirtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dirts = Dirt::all();
        $stations = $this->serveStation();
        return view('dirt.index', compact('dirts', 'stations'));
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
        Dirt::create($request->all());
        Log::writeLog('Dirt', 'Create New Dirt', Auth()->user()->name);
        return redirect()->back()->with('success', 'Kotoran '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dirt  $dirt
     * @return \Illuminate\Http\Response
     */
    public function show(Dirt $dirt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dirt  $dirt
     * @return \Illuminate\Http\Response
     */
    public function edit(Dirt $dirt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dirt  $dirt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Dirt::where('id', $id)->update([
            'name' => $request->name,
            'max' => $request->max,
            'interval' => $request->interval,
            'punishment' => $request->punishment,
            'admin' => Auth()->user()->name,
        ]);
        Log::writeLog('Dirt', 'Edit Dirt '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'Kotoran '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dirt  $dirt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dirt::where('id', $id)->delete();
        Log::writeLog('Dirt', 'Delete Dirt', Auth()->user()->name);
        return redirect()->back()->with('success', 'Kotoran has been deleted');
    }
}

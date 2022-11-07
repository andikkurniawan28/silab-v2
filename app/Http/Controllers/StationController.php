<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\Log;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        return view('station.index', compact('stations'));
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
        Station::create($request->all());
        Log::writeLog('Station', 'Create New Station', Auth()->user()->name);
        return redirect()->back()->with('success', 'Station '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit(Station $station)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Station::where('id', $id)->update([
            'name' => $request->name,
        ]);
        Log::writeLog('Station', 'Edit Station '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'Station '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Station::where('id', $id)->delete();
        Log::writeLog('Station', 'Delete Station', Auth()->user()->name);
        return redirect()->back()->with('success', 'Station has been deleted');
    }
}

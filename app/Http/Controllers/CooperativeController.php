<?php

namespace App\Http\Controllers;

use App\Models\Cooperative;
use App\Models\Log;
use Illuminate\Http\Request;

class CooperativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cooperatives = Cooperative::all();
        $stations = $this->serveStation();
        return view('cooperative.index', compact('cooperatives', 'stations'));
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
        Cooperative::create($request->all());
        Log::writeLog('Cooperative', 'Create New Cooperative', Auth()->user()->name);
        return redirect()->back()->with('success', 'KUD '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperative  $cooperative
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperative $cooperative)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperative  $cooperative
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperative $cooperative)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cooperative  $cooperative
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Cooperative::where('id', $id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'admin' => Auth()->user()->name,
        ]);
        Log::writeLog('Cooperative', 'Update Cooperative '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'KUD '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperative  $cooperative
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cooperative::where('id', $id)->delete();
        Log::writeLog('Cooperative', 'Delete Cooperative', Auth()->user()->name);
        return redirect()->back()->with('success', 'KUD has been deleted');
    }
}

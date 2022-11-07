<?php

namespace App\Http\Controllers;

use App\Models\Outpost;
use App\Models\Log;
use Illuminate\Http\Request;

class OutpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $outposts = Outpost::all();
        $stations = $this->serveStation();
        return view('outpost.index', compact('outposts', 'stations'));
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
        Outpost::create($request->all());
        Log::writeLog('Outpost', 'Create New Outpost', Auth()->user()->name);
        return redirect()->back()->with('success', 'Pos Pantau '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outpost  $outpost
     * @return \Illuminate\Http\Response
     */
    public function show(Outpost $outpost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outpost  $outpost
     * @return \Illuminate\Http\Response
     */
    public function edit(Outpost $outpost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outpost  $outpost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Outpost::where('id', $id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'admin' => Auth()->user()->name,
        ]);
        Log::writeLog('Outpost', 'Edit Outpost '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'Pos Pantau '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outpost  $outpost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Outpost::where('id', $id)->delete();
        Log::writeLog('Outpost', 'Delete Outpost', Auth()->user()->name);
        return redirect()->back()->with('success', 'Pos Pantau has been deleted');
    }
}

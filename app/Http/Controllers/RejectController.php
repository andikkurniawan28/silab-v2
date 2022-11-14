<?php

namespace App\Http\Controllers;

use App\Models\Reject;
use App\Models\Log;
use Illuminate\Http\Request;

class RejectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rejects = Reject::all();
        $stations = $this->serveStation();
        return view('reject.index', compact('rejects', 'stations'));
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
        Reject::create($request->all());
        Log::writeLog('Reject', 'Submit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Reject berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reject  $reject
     * @return \Illuminate\Http\Response
     */
    public function show(Reject $reject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reject  $reject
     * @return \Illuminate\Http\Response
     */
    public function edit(Reject $reject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reject  $reject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Reject::find($id)->update([
            'weight' => $request->weight,
            'weight_origin' => $request->weight_origin,
            'corrector' => Auth()->user()->name,
            'correction' => 1,
        ]);
        Log::writeLog('Reject', 'Edit Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Reject berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reject  $reject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reject::find($id)->delete();
        Log::writeLog('Reject', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Reject berhasil dihapus');
    }

    public function showCorrection()
    {
        $rejects = Reject::serveCorrected();
        $stations = $this->serveStation();
        return view('reject.correction', compact('rejects', 'stations'));
    }
}

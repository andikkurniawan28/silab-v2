<?php

namespace App\Http\Controllers;

use App\Models\Factor;
use App\Models\Log;
use Illuminate\Http\Request;

class FactorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factors = Factor::all();
        $stations = $this->serveStation();
        return view('factor.index', compact('factors', 'stations'));
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
        Factor::create($request->all());
        Log::writeLog('Factor', 'Create New Factor', Auth()->user()->name);
        return redirect()->back()->with('success', 'Factor '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function show(Factor $factor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function edit(Factor $factor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Factor::where('id', $id)->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);
        Log::writeLog('Factor', 'Edit Factor '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'Factor '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factor  $factor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Factor::where('id', $id)->delete();
        Log::writeLog('Factor', 'Delete Factor', Auth()->user()->name);
        return redirect()->back()->with('success', 'Factor has been deleted');
    }
}

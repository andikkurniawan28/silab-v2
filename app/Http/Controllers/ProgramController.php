<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Log;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::all();
        $stations = $this->serveStation();
        return view('program.index', compact('programs', 'stations'));
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
        Program::create($request->all());
        Log::writeLog('Program', 'Create New Program', Auth()->user()->name);
        return redirect()->back()->with('success', 'Program '.$request->name.' has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Program::where('id', $id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'admin' => Auth()->user()->name,
        ]);
        Log::writeLog('Program', 'Edit Program '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'Program '.$request->name.' has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Program::where('id', $id)->delete();
        Log::writeLog('Program', 'Delete Program', Auth()->user()->name);
        return redirect()->back()->with('success', 'Program has been deleted');
    }
}

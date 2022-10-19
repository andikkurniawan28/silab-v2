<?php

namespace App\Http\Controllers;

use App\Models\Mollase;
use App\Models\Log;
use Illuminate\Http\Request;

class MollaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mollases = Mollase::limit(1000)->get();
        return view('mollase.index', compact('mollases'));
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
            'admin' => session('name'),
        ]);
        Mollase::create($request->all());
        Log::writeLog('Mollase', 'Create New Mollase', session('name'));
        return redirect()->back()->with('success', 'Mollase has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mollase  $mollase
     * @return \Illuminate\Http\Response
     */
    public function show(Mollase $mollase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mollase  $mollase
     * @return \Illuminate\Http\Response
     */
    public function edit(Mollase $mollase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mollase  $mollase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Mollase::where('id', $id)->update([
            'volume_t1' => $request->volume_t1,
            'volume_t2' => $request->volume_t2,
            'volume_t3' => $request->volume_t3,
            'meters' => $request->meters,
        ]);
        Log::writeLog('Mollase', 'Edit Mollase', session('name'));
        return redirect()->back()->with('success', 'Mollase has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mollase  $mollase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mollase::find($id)->delete();
        Log::writeLog('Mollase', 'Delete Mollase', session('name'));
        return redirect()->back()->with('success', 'Mollase has been deleted');
    }
}

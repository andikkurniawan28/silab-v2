<?php

namespace App\Http\Controllers;

use App\Models\Chemical;
use App\Models\Log;
use Illuminate\Http\Request;

class ChemicalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chemicals = Chemical::limit(1000)->get();
        return view('chemical.index', compact('chemicals'));
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
        $request->request->add([ 'admin' => session('name'), ]);
        Chemical::create($request->all());
        Log::writeLog('Chemical', 'Create New Chemical', session('name'));
        return redirect()->back()->with('success', 'Chemical has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chemical  $chemical
     * @return \Illuminate\Http\Response
     */
    public function show(Chemical $chemical)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chemical  $chemical
     * @return \Illuminate\Http\Response
     */
    public function edit(Chemical $chemical)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chemical  $chemical
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Chemical::where('id', $id)->update([
            'kapur' => $request->kapur,
            'belerang' => $request->belerang,
            'floc' => $request->floc,
            'naoh' => $request->naoh,
            'b894' => $request->b894,
            'b895' => $request->b895,
            'b210' => $request->b210,
            'asam_phospat' => $request->asam_phospat,
            'blotong' => $request->blotong,
        ]);
        return redirect()->back()->with('success', 'Chemical has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chemical  $chemical
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Chemical::find($id)->delete();
        return redirect()->back()->with('success', 'Chemical has been deleted');
    }
}

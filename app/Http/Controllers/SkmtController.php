<?php

namespace App\Http\Controllers;

use App\Models\Rafaction;
use Illuminate\Http\Request;

class SkmtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $barcode = $request->barcode;
        $image[1] = $request->file('image1');
        $image[2] = $request->file('image2');
        $image[3] = $request->file('image3');
        $image[1]->store('image', 'public');
        $image[2]->store('image', 'public');
        $image[3]->store('image', 'public');
        Rafaction::where('barcode', $barcode)->update([
            'image1' => $image[1]->hashName(),
            'image2' => $image[2]->hashName(),
            'image3' => $image[3]->hashName(),
        ]);
        return redirect()->back()->with('success', 'SKMT has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rafaction  $rafaction
     * @return \Illuminate\Http\Response
     */
    public function show(Rafaction $rafaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rafaction  $rafaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Rafaction $rafaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rafaction  $rafaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rafaction $rafaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rafaction  $rafaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rafaction $rafaction)
    {
        //
    }
}

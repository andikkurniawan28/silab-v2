<?php

namespace App\Http\Controllers;

use App\Models\Rafaction;
use App\Models\Log;
use Illuminate\Http\Request;

class RafactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rafactions = Rafaction::latest()->paginate(500);
        $rafactions_null = Rafaction::where('image1', '=', NULL)
            ->where('image2', '=', NULL)
            ->where('image3', '=', NULL)
            ->get();
        $rafactions_unscored = Rafaction::where('score', '=', NULL)->get();
        $stations = $this->serveStation();
        return view('rafaction.index', compact('rafactions', 'rafactions_null', 'rafactions_unscored', 'stations'));
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
        $data = Rafaction::validateRequest($request);
        $request->request->add([
            'vehicle' => $data['vehicle'],
            'register' => $data['register'],
            'cooperative' => $data['cooperative'],
            'outpost' => $data['outpost'],
            'program' => $data['program'],
        ]);

        if($request->register == NULL)
            return redirect()->back()->with('error', 'Error : Nomor Antrian Salah ['.$request->barcode.'].');
        else
            Rafaction::create($request->all());
            Log::writeLog('Scoring MBS', 'Tap Barcode', Auth()->user()->name);
            return redirect()->back()->with('success', 'Scan Sukses');
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
    public function update(Request $request, Rafaction $rafaction, $id)
    {
        $score = Rafaction::generateScore($request);
        return $score;
        // Rafaction::find($request->barcode)->update([
        //     'score' => $score,
        // ]);
        // Log::writeLog('Scoring MBS', 'Assign Score', Auth()->user()->name);
        // return redirect()->back()->with('success', 'Scoring MBS has been assigned');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rafaction  $rafaction
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Rafaction::find($id)->delete();
        Log::writeLog('Scoring MBS', 'Delete Data', Auth()->user()->name);
        return redirect()->back()->with('success', 'Scoring MBS has been deleted');
    }

    public function assignScore(Request $request)
    {
        $score = Rafaction::generateScore($request);
        // Rafaction::where('barcode', $request->barcode)->update([
        //     'score' => $score,
        //     'analyst' => Auth()->user()->name,
        // ]);
        // Log::writeLog('Scoring MBS', 'Assign Score', Auth()->user()->name);
        // return redirect()->back()->with('success', 'Scoring MBS has been assigned');
        return $score;
    }
}

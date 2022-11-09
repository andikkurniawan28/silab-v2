<?php

namespace App\Http\Controllers;

use App\Models\Rafaction;
use App\Models\Register;
use App\Models\Dirt;
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
        $stations = $this->serveStation();
        $dirts = Dirt::all();
        $rafactions = Rafaction::latest()->paginate(500);
        $rafactions_null = Rafaction::where('image1', '=', NULL)
            ->where('image2', '=', NULL)
            ->where('image3', '=', NULL)
            ->orderBy('id', 'desc')
            ->get();

        for($i=1; $i<=5; $i++)
            $rafactions_unscored[$i] = Rafaction::where('score', '=', NULL)->where('spot', $i)->get();
        
        return view('rafaction.index', compact('rafactions', 'rafactions_null', 'rafactions_unscored', 'dirts', 'stations'));
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
        if(substr_count($request->barcode," ") > 0)
            return redirect()->back()->with('error', 'Error : Nomor Antrian salah ['.$request->barcode.'].');

        $data = Rafaction::validateRequest($request);
        $request->request->add([
            'vehicle' => $data['vehicle'],

            'register' => $data['register'],
            'truck_number' => $data['truck_number'],
            'farmer' => $data['farmer'],

            'cooperative' => $data['cooperative'],
            'outpost' => $data['outpost'],
            'program' => $data['program'],
        ]);

        if(Rafaction::where('barcode', $request->barcode)->count() > 0)
            return redirect()->back()->with('error', 'Error : Nomor Antrian sudah dipakai ['.$request->barcode.'].');
        
        if($request->register == NULL)
            return redirect()->back()->with('error', 'Error : Nomor Antrian Salah ['.$request->barcode.'].');
        else
            Rafaction::create($request->all());
            $rafaction_id = Rafaction::where('barcode', $request->barcode)->get()->last()->id;
            Log::writeLog('Scoring MBS', 'Tap Barcode', $request->farmer);
            return redirect()->route('waiting', [
                'nomor_meja' => $request->spot, 
                'rafaction_id' => $rafaction_id,
            ]);
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
        return redirect()->back()->with('success', 'Scoring MBS berhasil dihapus');
    }

    public function assignScore(Request $request)
    {
        $score = Rafaction::generateScore($request);
        Rafaction::where('barcode', $request->barcode)->update([
            'score' => $score,
            'analyst' => Auth()->user()->name,
        ]);
        Log::writeLog('Scoring MBS', 'Assign Score', Auth()->user()->name);
        return redirect()->back()->with('success', 'Scoring MBS berhasil disimpan');
    }
}

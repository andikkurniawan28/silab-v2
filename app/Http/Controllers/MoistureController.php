<?php

namespace App\Http\Controllers;

use App\Models\Moisture;
use App\Models\Sample;
use App\Models\Log;
use Illuminate\Http\Request;

class MoistureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moistures = Moisture::serveAll();
        $samples = Sample::serveAll();
        return view('moisture.index', compact('moistures', 'samples'));
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
        Moisture::create($request->all());
        Log::writeLog('Moisture', 'Submit Data', session('name'));
        return redirect()->back()->with('success', 'Data has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function show(Moisture $moisture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function edit(Moisture $moisture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Moisture::find($id)->update([
            'sample_id' => $request->sample_id,
            'moisture' => $request->moisture,
            'moisture_origin' => $request->moisture_origin,
            'corrector' => session('name'),
            'correction' => 1,
        ]);
        Log::writeLog('Moisture', 'Edit Data', session('name'));
        return redirect()->back()->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Moisture  $moisture
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Moisture::find($id)->delete();
        Log::writeLog('Moisture', 'Delete Data', session('name'));
        return redirect()->back()->with('success', 'Data has been deleted');
    }

    public function showCorrection()
    {
        $moistures = Moisture::serveCorrected();
        return view('moisture.correction', compact('moistures'));
    }

    public function showVerification()
    {
        $moistures = Moisture::serveUnverificated();
        return view('moisture.verification', compact('moistures'));
    }

    public function processVerification(Request $request)
    {
        if($request->checkAll == NULL) 
            return redirect()->back()->with('error', 'Error : No data to verified!');
        else 
        {
            $request->request->add([
                'master' => session('name'),
            ]);
            Moisture::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Moisture', 'Verify Data', session('name'));
            return redirect()->back()->with('success', 'Data has been verified by '.$request->master);
        }
    }
}

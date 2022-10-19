<?php

namespace App\Http\Controllers;

use App\Models\Core_big;
use App\Models\Log;
use Illuminate\Http\Request;

class CoreBigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $core_bigs = Core_big::limit(1000)->get();
        return view('core_big.index', compact('core_bigs'));
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
        $data = Core_big::validateRequest($request);
        $request->request->add([
            'register' => $data['register'],
            'cooperative' => $data['cooperative'],
            'outpost' => $data['outpost'],
            'program' => $data['program'],
            'yield' => $data['yield'],
            'admin' => session('name'),
        ]);
        Core_big::create($request->all());
        Log::writeLog('Core Sample EK', 'Submit Data', session('name'));
        return redirect()->back()->with('success', 'Data has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Core_big  $core_big
     * @return \Illuminate\Http\Response
     */
    public function show(Core_big $core_big)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Core_big  $core_big
     * @return \Illuminate\Http\Response
     */
    public function edit(Core_big $core_big)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Core_big  $core_big
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Core_big::validateRequest($request);
        $request->request->add([
            'register' => $data['register'],
            'cooperative' => $data['cooperative'],
            'outpost' => $data['outpost'],
            'program' => $data['program'],
            'yield' => $data['yield'],
        ]);
        Core_big::find($id)->update([
            'barcode' => $request->barcode,
            'batch' => $request->batch,
            'register' => $request->register,
            'cooperative' => $request->cooperative,
            'oupost' => $request->outpost,
            'program' => $request->program,
            'percent_brix' => $request->percent_brix,
            'percent_pol' => $request->percent_pol,
            'yield' => $request->yield,
            'percent_brix_origin' => $request->percent_brix_origin,
            'percent_pol_origin' => $request->percent_pol_origin,
            'yield_origin' => $request->yield_origin,
            'corrector' => session('name'),
            'correction' => 1,
        ]);
        Log::writeLog('Core Sample EK', 'Edit Data', session('name'));
        return redirect()->back()->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Core_big  $core_big
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Core_big::find($id)->delete();
        Log::writeLog('Core Sample EK', 'Delete Data', session('name'));
        return redirect()->back()->with('success', 'Data has been deleted');
    }

    public function showCorrection()
    {
        $core_bigs = Core_big::serveCorrected();
        return view('core_big.correction', compact('core_bigs'));
    }

    public function showVerification()
    {
        $core_bigs = Core_big::serveUnverificated();
        return view('core_big.verification', compact('core_bigs'));
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
            Core_big::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Core Sample EK', 'Verify Data', session('name'));
            return redirect()->back()->with('success', 'Data has been verified by '.$request->master);
        }
    }
}

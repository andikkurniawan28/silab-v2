<?php

namespace App\Http\Controllers;

use App\Models\Core_small;
use App\Models\Log;
use Illuminate\Http\Request;

class CoreSmallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $core_smalls = Core_small::limit(1000)->get();
        return view('core_small.index', compact('core_smalls'));
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
        $data = Core_small::validateRequest($request);
        $request->request->add([
            'register' => $data['register'],
            'cooperative' => $data['cooperative'],
            'outpost' => $data['outpost'],
            'program' => $data['program'],
            'yield' => $data['yield'],
            'admin' => session('name'),
        ]);
        Core_small::create($request->all());
        Log::writeLog('Core Sample EK', 'Submit Data', session('name'));
        return redirect()->back()->with('success', 'Data has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Core_small  $core_small
     * @return \Illuminate\Http\Response
     */
    public function show(Core_small $core_small)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Core_small  $core_small
     * @return \Illuminate\Http\Response
     */
    public function edit(Core_small $core_small)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Core_small  $core_small
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Core_small::validateRequest($request);
        $request->request->add([
            'register' => $data['register'],
            'cooperative' => $data['cooperative'],
            'outpost' => $data['outpost'],
            'program' => $data['program'],
            'yield' => $data['yield'],
        ]);
        Core_small::find($id)->update([
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
     * @param  \App\Models\Core_small  $core_small
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Core_small::find($id)->delete();
        Log::writeLog('Core Sample EK', 'Delete Data', session('name'));
        return redirect()->back()->with('success', 'Data has been deleted');
    }

    public function showCorrection()
    {
        $core_smalls = Core_small::serveCorrected();
        return view('core_small.correction', compact('core_smalls'));
    }

    public function showVerification()
    {
        $core_smalls = Core_small::serveUnverificated();
        return view('core_small.verification', compact('core_smalls'));
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
            Core_small::whereIn('id', $request->checkAll)->update([
                'is_verified' => 1,
                'master' => $request->master,
            ]);
            Log::writeLog('Core Sample EK', 'Verify Data', session('name'));
            return redirect()->back()->with('success', 'Data has been verified by '.$request->master);
        }
    }
}

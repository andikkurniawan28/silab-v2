<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Log;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balances = Balance::limit(1000)->get();
        return view('balance.index', compact('balances'));
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
        $data = Balance::countRawJuice($request);
        $request->request->add([
            'flow_raw_juice' => $data['flow_raw_juice'],
            'raw_juice_percent_sugar_cane' => $data['raw_juice_percent_sugar_cane'],
            'admin' => session('name'),
        ]);
        Balance::create($request->all());
        Log::writeLog('Balance', 'Create New Balance', session('name'));
        return redirect()->back()->with('success', 'Balance has been stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Balance::editRawJuice($request, $id);
        Balance::where('id', $id)->update([
            'sugar_cane' => $request->sugar_cane,
            'totalizer_raw_juice' => $request->totalizer_raw_juice,                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
            'flow_raw_juice' => $data['flow_raw_juice'],                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
            'raw_juice_percent_sugar_cane' => $data['raw_juice_percent_sugar_cane'],                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       
        ]);
        Log::writeLog('Balance', 'Edit Balance '.$request->name, session('name'));
        return redirect()->back()->with('success', 'Balance has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Balance::find($id)->delete();
        Log::writeLog('Balance', 'Delete Balance', session('name'));
        return redirect()->back()->with('success', 'Balance has been deleted');
    }
}
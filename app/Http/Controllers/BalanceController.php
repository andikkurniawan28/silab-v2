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
        $balances = Balance::latest()->paginate(1000);
        $stations = $this->serveStation();
        return view('balance.index', compact('balances', 'stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $balances = Balance::latest()->paginate(8);
        $stations = $this->serveStation();
        $vars = [
            'sugar_cane',
            'totalizer_raw_juice',
            'flow_raw_juice',
            'raw_juice_percent_sugar_cane',
        ];
        $labels = [
            'Tebu',
            'Totalizer',
            'Flow NM',
            'NM % Tebu',
        ];
        $colors = [
            'primary',
            'secondary',
            'success',
            'danger',
        ];
        return view('balance.monitoring', compact('balances', 'stations', 'vars', 'labels', 'colors'));
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
            'admin' => Auth()->user()->name,
        ]);
        Balance::create($request->all());
        Log::writeLog('Balance', 'Create New Balance', Auth()->user()->name);
        return redirect()->back()->with('success', 'Flow Nira Mentah has been stored');
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
        Log::writeLog('Balance', 'Edit Balance '.$request->name, Auth()->user()->name);
        return redirect()->back()->with('success', 'Flow Nira Mentah has been updated');
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
        Log::writeLog('Balance', 'Delete Balance', Auth()->user()->name);
        return redirect()->back()->with('success', 'Flow Nira Mentah has been deleted');
    }
}

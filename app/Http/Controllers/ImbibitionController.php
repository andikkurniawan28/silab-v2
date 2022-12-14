<?php

namespace App\Http\Controllers;

use App\Models\Imbibition;
use App\Models\Log;
use Illuminate\Http\Request;

class ImbibitionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imbibitions = Imbibition::latest()->paginate(1000);
        $stations = $this->serveStation();
        return view('imbibition.index', compact('imbibitions', 'stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imbibitions = Imbibition::serveMonitoring();
        for($i = 0; $i < count($imbibitions); $i++)
        {
            $imbibitions[$i]->percent_sugar_cane = number_format(($imbibitions[$i]->flow / $imbibitions[$i]->sugar_cane * 1000),2);
        }
        $stations = $this->serveStation();
        $vars = [
            'totalizer',
            'flow',
            'percent_sugar_cane',
        ];
        $labels = [
            'Totalizer',
            'Flow',
            'Imbibisi % Tebu',
        ];
        $colors = [
            'primary',
            'secondary',
            'success',
        ];
        return view('imbibition.monitoring', compact('imbibitions', 'stations', 'vars', 'labels', 'colors'));
        // return $imbibitions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Imbibition::countImbibition($request);
        $request->request->add([
            'flow' => $data['flow'],
            'admin' => Auth()->user()->name,
        ]);
        Imbibition::create($request->all());
        Log::writeLog('Imbibition', 'Create New Imbibition', Auth()->user()->name);
        return redirect()->back()->with('success', 'Imbibisi berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function show(Imbibition $imbibition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function edit(Imbibition $imbibition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Imbibition::editImbibition($request, $id);
        Imbibition::where('id', $id)->update([
            'totalizer' => $request->totalizer,
            'flow' => $data['flow'],
        ]);
        Log::writeLog('Imbibition', 'Edit Imbibition', Auth()->user()->name);
        return redirect()->back()->with('success', 'Imbibisi berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imbibition  $imbibition
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Imbibition::find($id)->delete();
        Log::writeLog('Imbibition', 'Delete Imbibition', Auth()->user()->name);
        return redirect()->back()->with('success', 'Imbibisi berhasil dihapus');
    }
}

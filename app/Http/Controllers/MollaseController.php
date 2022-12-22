<?php

namespace App\Http\Controllers;

use App\Models\Mollase;
use App\Models\Log;
use Illuminate\Http\Request;

class MollaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mollases = Mollase::latest()->paginate(1000);
        $stations = $this->serveStation();
        return view('mollase.index', compact('mollases', 'stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mollases = Mollase::latest()->paginate(8);
        $stations = $this->serveStation();
        $vars = [
            'volume_t1',
            'volume_t2',
            'volume_t3',
            'meters',
        ];
        $labels = [
            'Tangki 1',
            'Tangki 2',
            'Tangki 3',
            'Counter',
        ];
        $colors = [
            'primary',
            'secondary',
            'success',
            'danger',
        ];
        return view('mollase.monitoring', compact('mollases', 'stations', 'vars', 'labels', 'colors'));
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
            'admin' => Auth()->user()->name,
        ]);
        Mollase::create($request->all());
        Log::writeLog('Mollase', 'Create New Mollase', Auth()->user()->name);
        return redirect()->back()->with('success', 'Taksasi Tetes berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mollase  $mollase
     * @return \Illuminate\Http\Response
     */
    public function show(Mollase $mollase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mollase  $mollase
     * @return \Illuminate\Http\Response
     */
    public function edit(Mollase $mollase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mollase  $mollase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Mollase::where('id', $id)->update([
            'volume_t1' => $request->volume_t1,
            'volume_t2' => $request->volume_t2,
            'volume_t3' => $request->volume_t3,
            'meters' => $request->meters,
        ]);
        Log::writeLog('Mollase', 'Edit Mollase', Auth()->user()->name);
        return redirect()->back()->with('success', 'Taksasi Tetes berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mollase  $mollase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mollase::find($id)->delete();
        Log::writeLog('Mollase', 'Delete Mollase', Auth()->user()->name);
        return redirect()->back()->with('success', 'Taksasi Tetes berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Core_sample;
use App\Models\Station;

class CoreSampleMonitoringController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $stations = Station::all();
        $core_samples = Core_sample::latest()->paginate(1000);
        return view('core_sample.monitoring', compact('core_samples', 'stations'));
    }
}

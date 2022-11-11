<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rafaction;
use App\Models\Station;

class RafactionMonitoringController extends Controller
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
        $rafactions = Rafaction::latest()->paginate(1000);
        return view('rafaction.monitoring', compact('rafactions', 'stations'));
    }
}

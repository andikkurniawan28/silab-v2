<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rain;
use App\Models\Station;

class RainMonitoringController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data = Rain::serveData();
        $stations = Station::all();
        return view('agroklimat.index', compact('data', 'stations'));
    }
}

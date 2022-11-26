<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timbangan_rs_out;
use App\Models\Station;

class TimbanganRsOutController extends Controller
{
    public function index()
    {
        $data = Timbangan_rs_out::serve();
        $stations = Station::all();
        return view('timbangan_rs_out.index', compact('data', 'stations'));
    }
}

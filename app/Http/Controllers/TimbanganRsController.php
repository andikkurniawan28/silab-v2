<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timbangan_rs;
use App\Models\Station;

class TimbanganRsController extends Controller
{
    public function index()
    {
        $data = Timbangan_rs::serve();
        $stations = Station::all();
        return view('timbangan_rs.index', compact('data', 'stations'));
    }
}

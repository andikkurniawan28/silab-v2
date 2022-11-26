<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timbangan_tetes;
use App\Models\Station;

class TimbanganTetesController extends Controller
{
    public function index()
    {
        $data = Timbangan_tetes::serveTetes();
        $stations = Station::all();
        return view('timbangan_tetes.index', compact('data', 'stations'));
    }
}

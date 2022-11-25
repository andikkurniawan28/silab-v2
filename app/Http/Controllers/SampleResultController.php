<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\Station;
use App\Models\Material;

class SampleResultController extends Controller
{
    public function __invoke($material_id)
    {
        $title = Material::where('id', $material_id)->get()->last()->name;
        $method_id = Material::whereId($material_id)->get()->last()->method_id;
        $station_id = Material::where('id', $material_id)->get()->last()->station_id;
        $station_name = Station::where('id', $station_id)->get()->last()->name;
        $samples = Sample::where('material_id', $material_id)->latest()->paginate(1000);
        $stations = Station::all();
        return view('sample_result2.index', compact('title', 'method_id', 'station_id', 'station_name', 'samples', 'stations'));
    }
}

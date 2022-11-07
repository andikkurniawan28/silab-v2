<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use App\Models\Sample;
use App\Models\Log;

class BarcodeController extends Controller
{
    public function showBarcode(Request $request)
    {
        $foreignId = Material::where('id', $request->material_id)->select('station_id', 'method_id', 'name')->get()->first();
        $request->request->add([
            'station_id' => $foreignId->station_id,
            'method_id' => $foreignId->method_id,
            'admin' => Auth()->user()->name,
        ]);

        Sample::create($request->all());
        Log::writeLog('Sample', 'Create New Sample', Auth()->user()->name);

        $data = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->where('samples.material_id', $request->material_id)
            ->select('samples.id', 'materials.name')
            ->get()
            ->last();

        return view('barcode_sample.show', compact('data'));
    }
}

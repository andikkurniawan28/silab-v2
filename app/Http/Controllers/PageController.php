<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use App\Models\Station;
use App\Models\Material;
use App\Models\Analysis;
use App\Models\Ronsel;

class PageController extends Controller
{
    public function index()
    {
        return view('page.dashboard');
    }

    public function activityLogByUser()
    {
        $logs = Log::where('admin', session('name'))->limit(1000)->orderBy('id', 'desc')->get();
        return view('log.index', compact('logs'));
    }

    public function activityLog()
    {
        $logs = Log::limit(1000)->orderBy('id', 'desc')->get();
        return view('log.index', compact('logs'));
    }

    public function analysisResult()
    {
        $stations = Station::all();
        return view('analysis_result.index', compact('stations'));
    }

    public function stationResult($station_id)
    {
        $datas = Analysis::serveForStationResult($station_id);
        $title = Station::where('id', $station_id)->get()->first()->name;
        return view('station_result.index', compact('datas', 'title'));
    }

    public function sampleResult($material_id)
    {
        $title = Material::where('id', $material_id)->get()->first()->name;
        $method = Material::where('id', $material_id)->get()->first()->method_id;
        $station_id = Material::where('id', $material_id)->get()->first()->station_id;
        $station_name = Station::where('id', $station_id)->get()->first()->name;
        $datas = Analysis::serveForSampleResult($material_id, $method);
        return view('sample_result.index', compact('datas', 'title', 'method', 'station_id', 'station_name'));
    }

    public function report()
    {
        return view('documentation.report.index');
    }

    public function certificate()
    {
        return view('documentation.certificate.index');
    }

    public function barcodeSample()
    {
        $materials = Material::all();
        return view('barcode_sample.index', compact('materials'));
    }

    public function ronselMasakan()
    {
        $materials = Ronsel::serveMasakan();
        // return $materials;
        return view('ronsel_masakan.index', compact('materials'));
    }
}

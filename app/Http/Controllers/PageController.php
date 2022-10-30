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
        $data = Analysis::serveDashboard();
        $stations = $this->serveStation();
        return view('page.dashboard', compact('data', 'stations'));
    }

    public function activityLogByUser()
    {
        $logs = Log::where('admin', session('name'))->limit(1000)->orderBy('id', 'desc')->get();
        $stations = $this->serveStation();
        return view('log.index', compact('logs', 'stations'));
    }

    public function activityLog()
    {
        $logs = Log::limit(1000)->orderBy('id', 'desc')->get();
        $stations = $this->serveStation();
        return view('log.index', compact('logs', 'stations'));
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
        $stations = $this->serveStation();
        return view('station_result.index', compact('datas', 'title', 'stations'));
    }

    public function sampleResult($material_id)
    {
        $title = Material::where('id', $material_id)->get()->first()->name;
        $method = Material::where('id', $material_id)->get()->first()->method_id;
        $station_id = Material::where('id', $material_id)->get()->first()->station_id;
        $station_name = Station::where('id', $station_id)->get()->first()->name;
        $datas = Analysis::serveForSampleResult($material_id, $method);
        $stations = $this->serveStation();
        return view('sample_result.index', compact('datas', 'title', 'method', 'station_id', 'station_name', 'stations'));
    }

    public function report()
    {
        $stations = $this->serveStation();
        return view('documentation.report.index', compact('stations'));
    }

    public function certificate()
    {
        $stations = $this->serveStation();
        return view('documentation.certificate.index', compact('stations'));
    }

    public function barcodeSample()
    {
        $materials = Material::all();
        $stations = $this->serveStation();
        return view('barcode_sample.index', compact('materials', 'stations'));
    }

    public function ronselMasakan()
    {
        $materials = Ronsel::serveMasakan();
        $stations = $this->serveStation();
        return view('ronsel_masakan.index', compact('materials', 'stations'));
    }
}

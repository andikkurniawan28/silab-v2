<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Core_sample;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function labReport(Request $request)
    {
        $time = self::determineTimeRange($request);
        $data = Report::serveLabReport($time);
        $keliling = Report::serveKelilingReport($time);
        $chemical = Report::serveChemicalReport($time);
        return view('documentation.report.lab_report', compact('request', 'data', 'keliling', 'chemical'));
    }

    public function coreSampleReport(Request $request)
    {
        $time = self::determineTimeRange($request);
        $data = Report::serveCoreSampleReport($time);
        $global_accumulation = Core_sample::globalAccumulation($time);
        $pos_accumulation = Core_sample::posAccumulation($time);
        $kud_accumulation = Core_sample::kudAccumulation($time);
        $program_accumulation = Core_sample::programAccumulation($time);
        return view('documentation.report.core_sample_report', compact('request', 'data', 'global_accumulation', 'pos_accumulation', 'kud_accumulation', 'program_accumulation'));
    }

    public function determineTimeRange($request)
    {
        switch($request->shift)
        {
            case 0 : 
                $data['current'] = $request->date.' 05:00:00';
                $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+24 hours"));
            break;
            case 1 : 
                $data['current'] = $request->date.' 05:00:00';
                $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+8 hours"));
            break;
            case 2 : 
                $data['current'] = $request->date.' 13:00:00';
                $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+8 hours"));
            break;
            case 3 : 
                $data['current'] = $request->date.' 21:00:00';
                $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+8 hours"));
            break;
        }
        return $data;
    }

}

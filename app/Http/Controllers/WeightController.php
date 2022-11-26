<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Station;
use App\Models\Log;

class WeightController extends Controller
{
    public function adjustRawSugarOut(Request $request)
    {
        $datetime = self::mergeDateTime($request);

        DB::connection('raw_sugar')->table('raw_sugar_output')
            ->insert([
                'time' => $datetime,
                'tarra' => 0,
                'bruto' => 0,
                'netto' => $request->netto,
            ]);

        Log::writeLog('Timbangan RS Out', 'Adjust', Auth()->user()->name);

        return redirect()->back()->with('success', 'Raw Sugar Out has been adjusted');
    }

    public function adjustRawSugarIn(Request $request)
    {
        $datetime = self::mergeDateTime($request);

        DB::connection('raw_sugar')->table('raw_sugar')
            ->insert([
                'time' => $datetime,
                'tarra' => 0,
                'bruto' => 0,
                'netto' => $request->netto,
            ]);

        Log::writeLog('Timbangan RS In', 'Adjust', Auth()->user()->name);

        return redirect()->back()->with('success', 'Raw Sugar In has been adjusted');
    }

    public function adjustTetes(Request $request)
    {
        $datetime = self::mergeDateTime($request);

        DB::connection('tetes')->table('tetes')
            ->insert([
                'time' => $datetime,
                'tarra' => 0,
                'bruto' => 0,
                'netto' => $request->netto,
            ]);

        Log::writeLog('Timbangan Tetes', 'Adjust', Auth()->user()->name);

        return redirect()->back()->with('success', 'Tetes has been adjusted');
    }

    public function mergeDateTime($request)
    {
        $datetime = $request->date.' '.$request->time;
        return $datetime;
    }
}

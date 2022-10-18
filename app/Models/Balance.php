<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factor;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'sugar_cane',
        'totalizer_raw_juice',
        'flow_raw_juice',
        'raw_juice_percent_sugar_cane',
        'admin',
    ];

    public static function countRawJuice($request)
    {
        $count = self::count();
        if($count != 0)
        {
            $totalizer_raw_juice_latest = self::get()->last()->totalizer_raw_juice;
            $flow_raw_juice = self::findFlow($totalizer_raw_juice_latest, $request->totalizer_raw_juice);
            $raw_juice_percent_sugar_cane = self::findFlowPercentSugarCane($flow_raw_juice, $request->sugar_cane);
        }
        else
        {
            $flow_raw_juice = 0;
            $raw_juice_percent_sugar_cane = 0;
        }
        return $data = [
            'flow_raw_juice' => $flow_raw_juice,
            'raw_juice_percent_sugar_cane' => $raw_juice_percent_sugar_cane,
        ];
    }

    public static function editRawJuice($request, $id)
    {
        $totalizer_raw_juice_latest = self::where('id', '<', $id)->get()->last()->totalizer_raw_juice;
        $flow_raw_juice = self::findFlow($totalizer_raw_juice_latest, $request->totalizer_raw_juice);
        $raw_juice_percent_sugar_cane = self::findFlowPercentSugarCane($flow_raw_juice, $request->sugar_cane);
        return $data = [
            'flow_raw_juice' => $flow_raw_juice,
            'raw_juice_percent_sugar_cane' => $raw_juice_percent_sugar_cane,
        ];
    }

    public static function findFlow($totalizer_old, $totalizer_new)
    {
        $factor = Factor::findRawJuiceFactor();
        return $factor * ($totalizer_new - $totalizer_old);
    }

    public static function findFlowPercentSugarCane($flow, $sugar_cane)
    {
        return ($flow / $sugar_cane) * 1000;
    }
}

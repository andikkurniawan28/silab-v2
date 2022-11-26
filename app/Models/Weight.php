<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Weight extends Model
{
    use HasFactory;

    public static function determineTimeRange()
    {
        $data['now'] = date('Y-m-d');
        $data['today'] = date('Y-m-d 5:00:00');

        $data['yesterday'] = date('Y-m-d H:i', strtotime($data['today'] . "-24 hours"));
        $data['tommorow'] = date('Y-m-d H:i', strtotime($data['today'] . "+24 hours"));

        $data['today_afternoon'] = date('Y-m-d 13:00:00');
        $data['today_night'] = date('Y-m-d 21:00:00');

        $data['yesterday_afternoon'] = date('Y-m-d H:i', strtotime($data['today_afternoon'] . "-24 hours"));
        $data['yesterday_night'] = date('Y-m-d H:i', strtotime($data['today_night'] . "-24 hours"));

        return $data;
    }

    public static function raw_sugar_in_total()
    {
        $time = self::determineTimeRange();
        return DB::connection('raw_sugar')
                ->table('raw_sugar')
                ->where('time', '<', $time['today'])
                ->sum('netto');
    }

    public static function raw_sugar_out_total()
    {
        $time = self::determineTimeRange();
        return DB::connection('raw_sugar')
                ->table('raw_sugar_output')
                ->where('time', '<', $time['today'])
                ->sum('netto');
    }

    public static function tetes_total()
    {
        $time = self::determineTimeRange();
        return DB::connection('tetes')
                ->table('tetes')
                ->where('time', '<', $time['today'])
                ->sum('netto');
    }
}

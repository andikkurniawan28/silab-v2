<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Weight extends Model
{
    use HasFactory;

    public static function serveData()
    {
        $time = self::determineTimeRange();

        $data['tetes']['today'] =
            DB::connection('tetes')
                ->table('tetes')
                ->where('time', '>=', $time['yesterday'])
                ->where('time', '<', $time['today'])
                ->sum('netto');

        $data['tetes']['until_today'] =
            DB::connection('tetes')
                ->table('tetes')
                ->where('time', '<', $time['today'])
                ->sum('netto');

        for($i=0; $i<24; $i++)
        {
            $data['tetes']['hour'][$i] =
            DB::connection('tetes')
                ->table('tetes')
                ->where('time', '>=', date('Y-m-d '.$i.':00:00'))
                ->where('time', '<',  date('Y-m-d H:i', strtotime(date('Y-m-d '.$i.':00:00') . "+1 hours")))
                ->sum('netto');
        }

        $data['raw_sugar']['today'] =
            DB::connection('raw_sugar')
                ->table('raw_sugar')
                ->where('time', '>=', $time['yesterday'])
                ->where('time', '<', $time['today'])
                ->sum('netto');

        $data['raw_sugar']['until_today'] =
            DB::connection('raw_sugar')
                ->table('raw_sugar')
                ->where('time', '<', $time['today'])
                ->sum('netto');

        for($i=0; $i<24; $i++)
        {
            $data['raw_sugar']['hour'][$i] =
            DB::connection('raw_sugar')
                ->table('raw_sugar')
                ->where('time', '>=', date('Y-m-d '.$i.':00:00'))
                ->where('time', '<',  date('Y-m-d H:i', strtotime(date('Y-m-d '.$i.':00:00') . "+1 hours")))
                ->sum('netto');
        }

        $data['raw_sugar_output']['today'] =
            DB::connection('raw_sugar')
                ->table('raw_sugar_output')
                ->where('time', '>=', $time['yesterday'])
                ->where('time', '<', $time['today'])
                ->sum('netto');

        $data['raw_sugar_output']['until_today'] =
            DB::connection('raw_sugar')
                ->table('raw_sugar_output')
                ->where('time', '<', $time['today'])
                ->sum('netto');

        for($i=0; $i<24; $i++)
        {
            $data['raw_sugar_output']['hour'][$i] =
            DB::connection('raw_sugar')
                ->table('raw_sugar_output')
                ->where('time', '>=', date('Y-m-d '.$i.':00:00'))
                ->where('time', '<',  date('Y-m-d H:i', strtotime(date('Y-m-d '.$i.':00:00') . "+1 hours")))
                ->sum('netto');
        }

        return $data;
    }

    public static function determineTimeRange()
    {
        $data['now'] = date('Y-m-d');
        $data['today'] = date('Y-m-d 5:00:00');
        $data['yesterday'] = date('Y-m-d H:i', strtotime($data['today'] . "-24 hours"));
        $data['tommorow'] = date('Y-m-d H:i', strtotime($data['today'] . "+24 hours"));
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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    use HasFactory;

    public static function serveData()
    {
        $data['tetes'] = NULL;
        $data['rs_in'] = NULL;
        $data['rs_out'] = NULL;
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
}

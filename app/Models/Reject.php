<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reject extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'weight_origin',
        'admin',
        'corrector',
        'correction',
    ];

    public static function determineTimeRange()
    {
        $data['now'] = date('Y-m-d');
        $data['today'] = date('Y-m-d 5:00:00');
        $data['yesterday'] = date('Y-m-d H:i', strtotime($data['today'] . "-24 hours"));
        $data['tommorow'] = date('Y-m-d H:i', strtotime($data['today'] . "+24 hours"));
        return $data;
    }

    public static function serveCorrected()
    {
        return self::where('correction', 1)
            ->limit(1000)
            ->orderBy('id', 'desc')
            ->get();
    }

    public static function reject_total()
    {
        $time = self::determineTimeRange();
        return self::where('created_at', '<', $time['today'])->sum('weight');
    }
}

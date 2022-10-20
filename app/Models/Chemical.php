<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemical extends Model
{
    use HasFactory;
    protected $fillable = [
        'kapur',
        'belerang',
        'floc',
        'naoh',
        'b894',
        'b895',
        'b210',
        'asam_phospat',
        'blotong',
        'admin',
    ];

    public static function serveSumarryValueByTime($time, $parameter)
    {
        return self::where('chemicals.created_at', '>=', $time['current'])
            ->where('chemicals.created_at', '<', $time['tomorrow'])
            ->sum($parameter);
    }
}

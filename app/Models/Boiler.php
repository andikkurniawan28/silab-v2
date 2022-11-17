<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Boiler extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_id',
        'tds',
        'ph',
        'hardness',
        'phospate',
        'tds_origin',
        'ph_origin',
        'hardness_origin',
        'phospate_origin',
        'analyst',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }

    public static function serveCorrected()
    {
        return self::where('correction', 1)->get();
    }

    public static function serveUnverificated()
    {
        return self::where('is_verified', 0)->get();
    }
}

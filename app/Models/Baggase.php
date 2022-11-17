<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Saccharomat;

class Baggase extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_id',
        'corrected_pol',
        'dry',
        'water',
        'corrected_pol_origin',
        'dry_origin',
        'water_origin',
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

    public static function countWater($dry)
    {
        return 100 - $dry;
    }

    public static function countPol($pol, $water)
    {
        return (($pol/2) * 0.0286 * ((10000+$water)/100)*2.5);
    }
}

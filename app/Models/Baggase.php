<?php

namespace App\Models;

use App\Models\Factor;
use App\Models\Saccharomat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        $factor = Factor::where('name', 'Pol Ampas')->get()->last()->value;
        return (($pol/2) * 0.0286 * ((10000+$water)/100)*2.5) + $factor;
    }
}

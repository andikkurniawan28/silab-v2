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
        'admin',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveAll()
    {
        return self::join('samples', 'baggases.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->select(
                'baggases.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('baggases.id', 'desc')
            ->get();
    }

    public static function serveCorrected()
    {
        return self::join('samples', 'baggases.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('correction', 1)
            ->select(
                'baggases.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('baggases.id', 'desc')
            ->get();
    }

    public static function serveUnverificated()
    {
        return self::join('samples', 'baggases.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('is_verified', 0)
            ->select(
                'baggases.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('baggases.id', 'desc')
            ->get();
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

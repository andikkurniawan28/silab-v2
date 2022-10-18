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
        'admin',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveAll()
    {
        return self::join('samples', 'boilers.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->select(
                'boilers.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('boilers.id', 'desc')
            ->get();
    }

    public static function serveCorrected()
    {
        return self::join('samples', 'boilers.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('correction', 1)
            ->select(
                'boilers.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('boilers.id', 'desc')
            ->get();
    }

    public static function serveUnverificated()
    {
        return self::join('samples', 'boilers.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('is_verified', 0)
            ->select(
                'boilers.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('boilers.id', 'desc')
            ->get();
    }
}

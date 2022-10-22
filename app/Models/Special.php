<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Special extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_id',
        'tsai',
        'glucose',
        'fructose',
        'sucrose',
        'preparation_index',
        'fiber',
        'calcium',
        'optical_density',
        'sugar_reducted',
        'tsai_origin',
        'glucose_origin',
        'fructose_origin',
        'sucrose_origin',
        'preparation_index_origin',
        'fiber_origin',
        'calcium_origin',
        'optical_density_origin',
        'sugar_reducted_origin',
        'analyst',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveAll()
    {
        return self::join('samples', 'specials.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->select(
                'specials.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('specials.id', 'desc')
            ->get();
    }

    public static function serveCorrected()
    {
        return self::join('samples', 'specials.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('correction', 1)
            ->select(
                'specials.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('specials.id', 'desc')
            ->get();
    }

    public static function serveUnverificated()
    {
        return self::join('samples', 'specials.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('is_verified', 0)
            ->select(
                'specials.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('specials.id', 'desc')
            ->get();
    }
}

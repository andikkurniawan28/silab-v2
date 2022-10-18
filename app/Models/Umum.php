<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umum extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_id',
        'cao',
        'ph',
        'turbidity',
        'temperature',
        'cao_origin',
        'ph_origin',
        'turbidity_origin',
        'temperature_origin',
        'admin',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveAll()
    {
        return self::join('samples', 'umums.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->select(
                'umums.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('umums.id', 'desc')
            ->get();
    }

    public static function serveCorrected()
    {
        return self::join('samples', 'umums.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('correction', 1)
            ->select(
                'umums.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('umums.id', 'desc')
            ->get();
    }

    public static function serveUnverificated()
    {
        return self::join('samples', 'umums.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('is_verified', 0)
            ->select(
                'umums.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('umums.id', 'desc')
            ->get();
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coloromat extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_id',
        'icumsa',
        'icumsa_origin',
        'analyst',
        'preparation',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveAll()
    {
        return self::join('samples', 'coloromats.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->select(
                'coloromats.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('coloromats.id', 'desc')
            ->get();
    }

    public static function serveCorrected()
    {
        return self::join('samples', 'coloromats.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('correction', 1)
            ->select(
                'coloromats.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('coloromats.id', 'desc')
            ->get();
    }

    public static function serveUnverificated()
    {
        return self::join('samples', 'coloromats.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('is_verified', 0)
            ->select(
                'coloromats.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('coloromats.id', 'desc')
            ->get();
    }
    
}

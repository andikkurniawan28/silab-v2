<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moisture extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_id',
        'moisture',
        'moisture_origin',
        'analyst',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveAll()
    {
        return self::join('samples', 'moistures.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->select(
                'moistures.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('moistures.id', 'desc')
            ->get();
    }

    public static function serveCorrected()
    {
        return self::join('samples', 'moistures.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('correction', 1)
            ->select(
                'moistures.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('moistures.id', 'desc')
            ->get();
    }

    public static function serveUnverificated()
    {
        return self::join('samples', 'moistures.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('is_verified', 0)
            ->select(
                'moistures.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('moistures.id', 'desc')
            ->get();
    }
}

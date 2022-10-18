<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sugar extends Model
{
    use HasFactory;
    protected $table = 'sugars';
    protected $fillable = [
        'sample_id',
        'sulphur',
        'diameter',
        'blackspot',
        'sulphur_origin',
        'diameter_origin',
        'blackspot_origin',
        'admin',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveAll()
    {
        return self::join('samples', 'sugars.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->select(
                'sugars.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('sugars.id', 'desc')
            ->get();
    }

    public static function serveCorrected()
    {
        return self::join('samples', 'sugars.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('correction', 1)
            ->select(
                'sugars.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('sugars.id', 'desc')
            ->get();
    }

    public static function serveUnverificated()
    {
        return self::join('samples', 'sugars.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('is_verified', 0)
            ->select(
                'sugars.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('sugars.id', 'desc')
            ->get();
    }
}

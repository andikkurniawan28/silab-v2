<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sample;
use App\Models\Saccharomat;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'station_id',
        'method_id',
        'admin',
    ];

    public static function serveAll()
    {
        return self::join('stations', 'materials.station_id', 'stations.id')
            ->join('methods', 'materials.method_id', 'methods.id')
            ->select(
                'materials.*',
                'stations.name as station_name',
                'methods.name as method_name',
        )->get();
    }

    public static function serveMaterialByStation($station_id)
    {
        return self::where('station_id', $station_id)
            ->select(
                'id',
                'name',
                'method_id',
        )->get();
    }
}

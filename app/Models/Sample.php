<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'station_id',
        'method_id',
        'pan',
        'reef',
        'volume',
        'start_time',
        'finish_time',
        'operator',
        'admin',
    ];

    public static function serveAll()
    {
        return self::join('materials', 'samples.material_id', 'materials.id')
            ->join('stations', 'samples.station_id', 'stations.id')
            ->join('methods', 'samples.method_id', 'methods.id')
            ->select(
                'samples.*',
                'materials.name as material_name',
                'stations.name as station_name',
                'methods.name as method_name',
            )->get();
    }

    public static function checkIfSampleIsNpp($sample_id)
    {
        if(self::join('materials', 'samples.material_id', 'materials.id')
            ->where('samples.id', $sample_id)
            ->select('materials.name as material_name')
            ->get()
            ->first()->material_name == 'Nira Gilingan 1')
        return 1;
        else return 0;
    }

    public static function checkIfSampleIsAmpasOrBlotong($sample_id)
    {
        return self::where('id', $sample_id)
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('materials.name','LIKE','Ampas %')
            ->orWhere('materials.name','LIKE','Blotong %')
            ->select('materials.name as material_name')
            ->count();
    }
    
    public function checkSampleStation($sample_id)
    {
        return self::where('id', $sample_id)->get()->first()->station_id;
    }
}

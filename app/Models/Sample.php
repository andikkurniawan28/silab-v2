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

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function method()
    {
        return $this->belongsTo(Method::class);
    }

    public function saccharomat()
    {
        return $this->hasOne(Saccharomat::class);
    }

    public function coloromat()
    {
        return $this->hasOne(Coloromat::class);
    }

    public function moisture()
    {
        return $this->hasOne(Moisture::class);
    }

    public function baggase()
    {
        return $this->hasOne(Baggase::class);
    }

    public function boiler()
    {
        return $this->hasOne(Boiler::class);
    }

    public function umum()
    {
        return $this->hasOne(Umum::class);
    }

    public function sugar()
    {
        return $this->hasOne(Sugar::class);
    }

    public function special()
    {
        return $this->hasOne(Special::class);
    }
}

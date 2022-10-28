<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sample;
use App\Models\Material;

class Certificate extends Model
{
    use HasFactory;

    public static function serveMollasesCertificate($time)
    {
        $data = Material::where('station_id', 9)->select('id', 'name')->get();
        for($i=0; $i<count($data); $i++)
        {
            $data[$i]['percent_brix'] = self::serveAveragePercentBrix($data[$i]['id'], $time);
            $data[$i]['tsai'] = self::serveAverageTsai($data[$i]['id'], $time);
            $data[$i]['optical_density'] = self::serveAverageOpticalDensity($data[$i]['id'], $time);
        }
        return $data;
    }

    public static function serveKapurCertificate($time)
    {
        $data = Material::where('name', 'like', 'Kapur %')->select('id', 'name')->get();
        for($i=0; $i<count($data); $i++)
        {
            $data[$i]['calcium'] = self::serveAverageCalcium($data[$i]['id'], $time);
        }
        return $data;
    }

    public static function getMollasesData($time, $material)
    {
        return Sample::join('materials', 'samples.material_id', 'materials.id')
            ->leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
            ->leftjoin('specials', 'samples.id', 'specials.sample_id')
            ->where('materials.name', $material)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->select(
            'samples.created_at',
            'materials.name',
            'saccharomats.percent_brix',
            'specials.tsai',
            'specials.optical_density',)
            ->get();
    }

    public static function getKapurData($time, $material)
    {
        return Sample::join('materials', 'samples.material_id', 'materials.id')
        ->leftjoin('specials', 'samples.id', 'specials.sample_id')
        ->where('materials.name', $material)
        ->where('samples.created_at', '>=', $time['current'])
        ->where('samples.created_at', '<', $time['tomorrow'])
        ->select(
            'samples.created_at',
            'materials.name',
            'specials.calcium',
        )->get();
    }

    public static function serveAveragePercentBrix($material_id, $time)
    {
        return Sample::join('saccharomats', 'samples.id', 'saccharomats.sample_id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('samples.material_id', $material_id)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->where('saccharomats.is_verified', 1)
            ->avg('percent_brix');
    }

    public static function serveAverageTsai($material_id, $time)
    {
        return Sample::join('specials', 'samples.id', 'specials.sample_id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('samples.material_id', $material_id)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->where('specials.is_verified', 1)
            ->avg('tsai');
    }

    public static function serveAverageOpticalDensity($material_id, $time)
    {
        return Sample::join('specials', 'samples.id', 'specials.sample_id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('samples.material_id', $material_id)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->where('specials.is_verified', 1)
            ->avg('optical_density');
    }

    public static function serveAverageCalcium($material_id, $time)
    {
        return Sample::join('specials', 'samples.id', 'specials.sample_id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('samples.material_id', $material_id)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->where('specials.is_verified', 1)
            ->avg('calcium');
    }

}

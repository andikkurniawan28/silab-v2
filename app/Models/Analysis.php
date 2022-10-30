<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;
use App\Models\Method;

class Analysis extends Model
{
    use HasFactory;

    public static function serveForStationResult($station_id)
    {
        $data = Material::serveMaterialByStation($station_id);
        $data = self::addAnalysisResult($data);
        return $data;
    }

    public static function addAnalysisResult($data)
    {
        for($i=0; $i<count($data); $i++) 
        $data[$i]['analysis_result'] = Method::serveByMethodId($data[$i]['method_id'], $data[$i]['id'],  5); 
        return $data;
    }

    public static function serveForSampleResult($material_id, $method_id)
    {
        $data = Method::serveByMethodId($method_id, $material_id, 1000); 
        return $data;
    }

    public function serveAverageValueByTime($time, $material_id, $parameter, $table)
    {
        return Sample::join($table, 'samples.id', $table.'.sample_id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('materials.id', $material_id)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->where($table.'.is_verified', 1)
            ->avg($parameter);
    }

    public static function serveDashboard()
    {
        $data['rendemen_npp'] = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->join('saccharomats', 'samples.id', 'saccharomats.sample_id')
            ->where('materials.name', 'Nira Gilingan 1')
            ->where('saccharomats.is_verified', 1)
            ->select('saccharomats.yield')
            ->get()
            ->last();

        $data['pol_ampas'] = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->join('baggases', 'samples.id', 'baggases.sample_id')
            ->where('materials.name', 'Ampas Gilingan 5')
            ->select('baggases.corrected_pol')
            ->where('baggases.is_verified', 1)
            ->get()
            ->last();

        $data['hk_tetes'] = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->join('saccharomats', 'samples.id', 'saccharomats.sample_id')
            ->where('materials.name', 'Tetes Puteran')
            ->select('saccharomats.purity')
            ->where('saccharomats.is_verified', 1)
            ->get()
            ->last();

        $data['icumsa_shs'] = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->join('coloromats', 'samples.id', 'coloromats.sample_id')
            ->where('materials.name', 'Gula SHS')
            ->select('coloromats.icumsa')
            ->where('coloromats.is_verified', 1)
            ->get()
            ->last();

        $data['reject'] = Reject::limit(10)->orderBy('id', 'desc')->get();

        return $data;
    }
    
}

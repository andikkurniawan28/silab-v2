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
    
}

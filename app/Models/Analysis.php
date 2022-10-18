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
}

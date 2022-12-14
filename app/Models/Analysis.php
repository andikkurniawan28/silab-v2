<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;
use App\Models\Method;
use App\Models\Weight;
use App\Models\Reject;

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
        $data = Sample::join($table, 'samples.id', $table.'.sample_id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('materials.id', $material_id)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->where($table.'.is_verified', 1)
            ->avg($parameter);

        if($data != NULL)
        return number_format($data, 2);
        else
        return NULL;
    }

    public function serveSummaryValueByTime($time, $material_id, $parameter)
    {
        return Sample::join('materials', 'samples.material_id', 'materials.id')
            ->where('materials.id', $material_id)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->sum('samples.'.$parameter);

    }

    public function serveCountValueByTime($time, $material_id, $parameter)
    {
        return Sample::join('materials', 'samples.material_id', 'materials.id')
            ->where('materials.id', $material_id)
            ->where('samples.created_at', '>=', $time['current'])
            ->where('samples.created_at', '<', $time['tomorrow'])
            ->count('samples.'.$parameter);
    }

    public static function serveDashboard()
    {
        $query = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->join('saccharomats', 'samples.id', 'saccharomats.sample_id')
            ->where('materials.name', 'Nira Gilingan 1')
            ->where('saccharomats.is_verified', 1)
            ->select('saccharomats.yield');

        if($query->count() > 0)
            $data['rendemen_npp'] = $query->get()->last()->yield;
        else
            $data['rendemen_npp'] = NULL;

        $query = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->join('baggases', 'samples.id', 'baggases.sample_id')
            ->where('materials.name', 'Ampas Gilingan 5')
            ->where('baggases.is_verified', 1)
            ->select('baggases.corrected_pol');

        if($query->count() > 0)
            $data['pol_ampas'] = $query->get()->last()->corrected_pol;
        else
            $data['pol_ampas'] = NULL;

        $query = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->join('saccharomats', 'samples.id', 'saccharomats.sample_id')
            ->where('materials.name', 'Tetes Puteran')
            ->where('saccharomats.is_verified', 1)
            ->select('saccharomats.purity');

        if($query->count() > 0)
            $data['hk_tetes'] = $query->get()->last()->purity;
        else
            $data['hk_tetes'] = NULL;

        $query = Sample::join('materials', 'samples.material_id', 'materials.id')
            ->join('coloromats', 'samples.id', 'coloromats.sample_id')
            ->where('materials.name', 'Gula SHS')
            ->where('coloromats.is_verified', 1)
            ->select('coloromats.icumsa');

        if($query->count() > 0)
            $data['icumsa_shs'] = $query->get()->last()->icumsa;
        else
            $data['icumsa_shs'] = NULL;

        // $data['reject'] = Reject::latest()->paginate(10);

        // $data['target_raw_sugar'] = 50000000;
        // $data['target_tebu_tergiling'] = 1;
        // $data['target_produksi_shs'] = 1;
        // $data['target_produksi_tetes'] = 100000000;
        // $data['target_reject_shs'] = 50000000;

        // $data['produksi_raw_sugar'] = Weight::raw_sugar_in_total();
        // $data['tebu_tergiling'] = 1;
        // $data['produksi_shs'] = 1;
        // $data['produksi_tetes'] = Weight::tetes_total();
        // $data['reject_shs'] = Reject::reject_total();

        // $data['realisasi_raw_sugar'] = $data['produksi_raw_sugar'] / $data['target_raw_sugar'] * 100;
        // $data['realisasi_tebu_tergiling'] = $data['tebu_tergiling'] / $data['target_tebu_tergiling'] * 100;
        // $data['realisasi_produksi_shs'] = $data['produksi_shs'] / $data['target_produksi_shs'] * 100;
        // $data['realisasi_produksi_tetes'] = $data['produksi_tetes'] / $data['target_produksi_tetes'] * 100;
        // $data['realisasi_reject_shs'] = $data['reject_shs'] / $data['target_reject_shs'] * 100;

        return $data;
    }

}

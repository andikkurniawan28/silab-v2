<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;
use App\Models\Station;
use App\Models\Analysis;
use App\Models\Around;
use App\Models\Chemical;
use App\Models\Core_sample;

class Report extends Model
{
    use HasFactory;

    public static function serveLabReport($time)
    {
        $data = Station::select('id as station_id', 'name as station_name')->get();
        for($i = 0; $i < count($data); $i++)
        {
            $data[$i]['material'] = Material::where('station_id', $data[$i]['station_id'])->select('id as material_id', 'name as material_name', 'method_id')->get();
            for($j = 0; $j < count($data[$i]['material']); $j++)
            {
                $data[$i]['material'][$j]['volume'] = Analysis::serveSummaryValueByTime($time, $data[$i]['material'][$j]['material_id'], 'volume');
                $data[$i]['material'][$j]['pan'] = Analysis::serveCountValueByTime($time, $data[$i]['material'][$j]['material_id'], 'pan');
                $data[$i]['material'][$j]['percent_brix'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'percent_brix', 'saccharomats');
                $data[$i]['material'][$j]['percent_pol'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'percent_pol', 'saccharomats');
                $data[$i]['material'][$j]['pol'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'pol', 'saccharomats');
                $data[$i]['material'][$j]['purity'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'purity', 'saccharomats');
                $data[$i]['material'][$j]['yield'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'yield', 'saccharomats');
                $data[$i]['material'][$j]['icumsa'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'icumsa', 'coloromats');
                $data[$i]['material'][$j]['moisture'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'moisture', 'moistures');
                $data[$i]['material'][$j]['corrected_pol'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'corrected_pol', 'baggases');
                $data[$i]['material'][$j]['dry'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'dry', 'baggases');
                $data[$i]['material'][$j]['water'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'water', 'baggases');
                $data[$i]['material'][$j]['cao'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'cao', 'umums');
                $data[$i]['material'][$j]['ph'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'ph', 'umums');
                $data[$i]['material'][$j]['turbidity'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'turbidity', 'umums');
                $data[$i]['material'][$j]['temperature'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'temperature', 'umums');
                $data[$i]['material'][$j]['tds'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'tds', 'boilers');
                $data[$i]['material'][$j]['ph_boiler'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'ph', 'boilers');
                $data[$i]['material'][$j]['hardness'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'hardness', 'boilers');
                $data[$i]['material'][$j]['phospate'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'phospate', 'boilers');
                $data[$i]['material'][$j]['sulphur'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'sulphur', 'sugars');
                $data[$i]['material'][$j]['diameter'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'diameter', 'sugars');
                $data[$i]['material'][$j]['blackspot'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'blackspot', 'sugars');
                $data[$i]['material'][$j]['tsai'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'tsai', 'specials');
                $data[$i]['material'][$j]['glucose'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'glucose', 'specials');
                $data[$i]['material'][$j]['fructose'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'fructose', 'specials');
                $data[$i]['material'][$j]['sucrose'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'sucrose', 'specials');
                $data[$i]['material'][$j]['preparation_index'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'preparation_index', 'specials');
                $data[$i]['material'][$j]['fiber'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'fiber', 'specials');
                $data[$i]['material'][$j]['calcium'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'calcium', 'specials');
                $data[$i]['material'][$j]['optical_density'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'optical_density', 'specials');
                $data[$i]['material'][$j]['sugar_reducted'] = Analysis::serveAverageValueByTime($time, $data[$i]['material'][$j]['material_id'], 'sugar_reducted', 'specials');
            }
        }
        return $data;
    }

    public static function serveKelilingReport($time)
    {
        $data['tek_pe1'] = Around::serveAverageValueByTime($time, 'tek_pe1');
        $data['tek_pe2'] = Around::serveAverageValueByTime($time, 'tek_pe2');
        $data['tek_evap1'] = Around::serveAverageValueByTime($time, 'tek_evap1');
        $data['tek_evap2'] = Around::serveAverageValueByTime($time, 'tek_evap2');
        $data['tek_evap3'] = Around::serveAverageValueByTime($time, 'tek_evap3');
        $data['tek_evap4'] = Around::serveAverageValueByTime($time, 'tek_evap4');
        $data['tek_evap5'] = Around::serveAverageValueByTime($time, 'tek_evap5');
        $data['tek_evap6'] = Around::serveAverageValueByTime($time, 'tek_evap6');
        $data['tek_evap7'] = Around::serveAverageValueByTime($time, 'tek_evap7');
        $data['tek_pan1'] = Around::serveAverageValueByTime($time, 'tek_pan1');
        $data['tek_pan2'] = Around::serveAverageValueByTime($time, 'tek_pan2');
        $data['tek_pan3'] = Around::serveAverageValueByTime($time, 'tek_pan3');
        $data['tek_pan4'] = Around::serveAverageValueByTime($time, 'tek_pan4');
        $data['tek_pan5'] = Around::serveAverageValueByTime($time, 'tek_pan5');
        $data['tek_pan6'] = Around::serveAverageValueByTime($time, 'tek_pan6');
        $data['tek_pan7'] = Around::serveAverageValueByTime($time, 'tek_pan7');
        $data['tek_pan8'] = Around::serveAverageValueByTime($time, 'tek_pan8');
        $data['tek_pan9'] = Around::serveAverageValueByTime($time, 'tek_pan9');
        $data['tek_pan10'] = Around::serveAverageValueByTime($time, 'tek_pan10');
        $data['tek_pan11'] = Around::serveAverageValueByTime($time, 'tek_pan11');
        $data['tek_pan12'] = Around::serveAverageValueByTime($time, 'tek_pan12');
        $data['tek_pan13'] = Around::serveAverageValueByTime($time, 'tek_pan13');
        $data['tek_pan14'] = Around::serveAverageValueByTime($time, 'tek_pan14');
        $data['tek_vakum'] = Around::serveAverageValueByTime($time, 'tek_vakum');
        $data['tek_vakum'] = Around::serveAverageValueByTime($time, 'tek_vakum');
        $data['suhu_pe1'] = Around::serveAverageValueByTime($time, 'suhu_pe1');
        $data['suhu_pe2'] = Around::serveAverageValueByTime($time, 'suhu_pe2');
        $data['suhu_evap1'] = Around::serveAverageValueByTime($time, 'suhu_evap1');
        $data['suhu_evap2'] = Around::serveAverageValueByTime($time, 'suhu_evap2');
        $data['suhu_evap3'] = Around::serveAverageValueByTime($time, 'suhu_evap3');
        $data['suhu_evap4'] = Around::serveAverageValueByTime($time, 'suhu_evap4');
        $data['suhu_evap5'] = Around::serveAverageValueByTime($time, 'suhu_evap5');
        $data['suhu_evap6'] = Around::serveAverageValueByTime($time, 'suhu_evap6');
        $data['suhu_evap7'] = Around::serveAverageValueByTime($time, 'suhu_evap7');
        $data['suhu_heater1'] = Around::serveAverageValueByTime($time, 'suhu_heater1');
        $data['suhu_heater2'] = Around::serveAverageValueByTime($time, 'suhu_heater2');
        $data['suhu_heater3'] = Around::serveAverageValueByTime($time, 'suhu_heater3');
        $data['suhu_air_injeksi'] = Around::serveAverageValueByTime($time, 'suhu_air_injeksi');
        $data['suhu_air_terjun'] = Around::serveAverageValueByTime($time, 'suhu_air_terjun');
        $data['uap_baru'] = Around::serveAverageValueByTime($time, 'uap_baru');
        $data['uap_bekas'] = Around::serveAverageValueByTime($time, 'uap_bekas');
        $data['uap_3ato'] = Around::serveAverageValueByTime($time, 'uap_3ato');
        return $data;
    }

    public static function serveChemicalReport($time)
    {
        $data['kapur'] = Chemical::serveSumarryValueByTime($time, 'kapur');
        $data['belerang'] = Chemical::serveSumarryValueByTime($time, 'belerang');
        $data['floc'] = Chemical::serveSumarryValueByTime($time, 'floc');
        $data['naoh'] = Chemical::serveSumarryValueByTime($time, 'naoh');
        $data['b894'] = Chemical::serveSumarryValueByTime($time, 'b894');
        $data['b895'] = Chemical::serveSumarryValueByTime($time, 'b895');
        $data['b210'] = Chemical::serveSumarryValueByTime($time, 'b210');
        $data['asam_phospat'] = Chemical::serveSumarryValueByTime($time, 'asam_phospat');
        $data['blotong'] = Chemical::serveSumarryValueByTime($time, 'blotong');
        return $data;
    }

    public static function serveCoreSampleReport($time)
    {
        $data = Core_sample::serveValueByTime($time);
        return $data;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Material;
use App\Models\Station;
use App\Models\Analysis;

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

}

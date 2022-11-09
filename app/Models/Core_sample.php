<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cooperative;
use App\Models\Outpost;
use App\Models\Program;
use App\Models\Saccharomat;
use App\Models\Register;

class Core_sample extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'spot',
        'batch',
        'register',
        'vehicle',
        'cooperative',
        'outpost',
        'program',
        'percent_brix',
        'percent_pol',
        'yield',
        'percent_brix_origin',
        'percent_pol_origin',
        'yield_origin',
        'analyst',
        'corrector',
        'correction',
    ];

    public static function serveCorrected()
    {
        return self::where('correction', 1)->limit(1000)->orderBy('core_samples.id', 'desc')->get();
    }

    public static function serveUnverificated()
    {
        return self::where('is_verified', 0)->limit(1000)->orderBy('core_samples.id', 'desc')->get();
    }

    public static function validateRequest($request)
    {
        $vehicle = self::findVehicle($request->barcode);
        $barcode_info = Register::findBarcodeInfo($request->barcode);
        $register = $barcode_info['register'];
        $cooperative = Cooperative::getCooperative($register);
        $outpost = Outpost::getOutpost($register);
        $program = Program::getProgram($register);
        $yield = Saccharomat::findYield($request->percent_pol, $request->percent_brix);
        return $data = [
            'vehicle' => $vehicle,
            'register' => $register,
            'cooperative' => $cooperative,
            'outpost' => $outpost,
            'program' => $program,
            'yield' => $yield,
        ];
        return $data;
    }

    public static function findVehicle($barcode)
    {
        $code = substr($barcode, 2, 1);
        switch($code)
        {
            case 'K' : $vehicle = 'Engkel Kecil'; break;
            case 'B' : $vehicle = 'Engkel Besar'; break;
            case 'G' : $vehicle = 'Gandeng'; break;
            default : $vehicle = NULL; break;
        }
        return $vehicle;
    }

    public static function serveValueByTime($time)
    {
        return self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->get();
    }

    public static function averageAnalysis($time, $vehicle, $parameter)
    {
        return self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->where('vehicle', $vehicle)
            ->avg($parameter);
    }

    public static function averageWithoutVehicle($time, $parameter)
    {
        return self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->avg($parameter);
    }

    public static function countRitByVehicle($time, $vehicle)
    {
        return self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->where('vehicle', $vehicle)
            ->count('id');
    }

    public static function countRitAll($time)
    {
        return self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->count('id');
    }

    public function findAnalysisByColumnAndVehicle($time, $column, $value, $vehicle, $parameter)
    {
        return self::where($column, $value)
            ->where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->where('vehicle', $vehicle)
            ->avg($parameter);
    }

    public function findAnalysisByColumn($time, $column, $value, $parameter)
    {
        return self::where($column, $value)
            ->where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->avg($parameter);
    }

    public static function globalAccumulation($time)
    {
        $data['rit_engkel_kecil'] = self::countRitByVehicle($time, 'Engkel Kecil');
        $data['rit_engkel_besar'] = self::countRitByVehicle($time, 'Engkel Besar');
        $data['rit_gandeng'] = self::countRitByVehicle($time, 'Gandeng');
        $data['rit_all'] = self::countRitAll($time);
        $data['percent_brix_engkel_kecil'] = self::averageAnalysis($time, 'Engkel Kecil', 'percent_brix');
        $data['percent_brix_engkel_besar'] = self::averageAnalysis($time, 'Engkel Besar', 'percent_brix');
        $data['percent_brix_gandeng'] = self::averageAnalysis($time, 'Gandeng', 'percent_brix');
        $data['percent_brix_all'] = self::averageWithoutVehicle($time, 'percent_brix');
        $data['percent_pol_engkel_kecil'] = self::averageAnalysis($time, 'Engkel Kecil', 'percent_pol');
        $data['percent_pol_engkel_besar'] = self::averageAnalysis($time, 'Engkel Besar', 'percent_pol');
        $data['percent_pol_gandeng'] = self::averageAnalysis($time, 'Gandeng', 'percent_pol');
        $data['percent_pol_all'] = self::averageWithoutVehicle($time, 'percent_pol');
        $data['yield_engkel_kecil'] = self::averageAnalysis($time, 'Engkel Kecil', 'yield');
        $data['yield_engkel_besar'] = self::averageAnalysis($time, 'Engkel Besar', 'yield');
        $data['yield_gandeng'] = self::averageAnalysis($time, 'Engkel Besar', 'yield');
        $data['yield_all'] = self::averageWithoutVehicle($time, 'yield');
        return $data;
    }

    public static function posAccumulation($time)
    {
        $post = Outpost::select('name')->get();
        for($i = 0; $i < count($post); $i++)
        {
            $post[$i]->yield_ek = self::findAnalysisByColumnAndVehicle($time, 'outpost', $post[$i]->name, 'Engkel Kecil', 'yield');
            $post[$i]->yield_eb = self::findAnalysisByColumnAndVehicle($time, 'outpost', $post[$i]->name, 'Engkel Besar', 'yield');
            $post[$i]->yield_gd = self::findAnalysisByColumnAndVehicle($time, 'outpost', $post[$i]->name, 'Gandeng', 'yield');
            $post[$i]->yield_all = self::findAnalysisByColumn($time, 'outpost', $post[$i]->name, 'yield');
        }
        return $post;
    }

    public static function kudAccumulation($time)
    {
        $kud = Cooperative::select('name')->get();
        for($i = 0; $i < count($kud); $i++)
        {
            $kud[$i]->yield_ek = self::findAnalysisByColumnAndVehicle($time, 'cooperative', $kud[$i]->name, 'Engkel Kecil', 'yield');
            $kud[$i]->yield_eb = self::findAnalysisByColumnAndVehicle($time, 'cooperative', $kud[$i]->name, 'Engkel Besar', 'yield');
            $kud[$i]->yield_gd = self::findAnalysisByColumnAndVehicle($time, 'cooperative', $kud[$i]->name, 'Gandeng', 'yield');
            $kud[$i]->yield_all = self::findAnalysisByColumn($time, 'cooperative', $kud[$i]->name, 'yield');
        }
        return $kud;
    }

    public static function programAccumulation($time)
    {
        $program = Program::select('name')->get();
        for($i = 0; $i < count($program); $i++)
        {
            $program[$i]->yield_ek = self::findAnalysisByColumnAndVehicle($time, 'program', $program[$i]->name, 'Engkel Kecil', 'yield');
            $program[$i]->yield_eb = self::findAnalysisByColumnAndVehicle($time, 'program', $program[$i]->name, 'Engkel Besar', 'yield');
            $program[$i]->yield_gd = self::findAnalysisByColumnAndVehicle($time, 'program', $program[$i]->name, 'Gandeng', 'yield');
            $program[$i]->yield_all = self::findAnalysisByColumn($time, 'program', $program[$i]->name, 'yield');
        }
        return $program;
    }

}

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
        $register = Register::findRegister($request->barcode);
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

    public static function globalAccumulation($time)
    {
        $data['rit_engkel_kecil'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Engkel Kecil')
            ->where('created_at', '<', $time['tomorrow'])
            ->count('id');

        $data['rit_engkel_besar'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Engkel Besar')
            ->where('created_at', '<', $time['tomorrow'])
            ->count('id');

        $data['rit_gandeng'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Gandeng')
            ->where('created_at', '<', $time['tomorrow'])
            ->count('id');

        $data['rit_all'] = self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->count('id');

        $data['percent_brix_engkel_kecil'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Engkel Kecil')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('percent_brix');

        $data['percent_brix_engkel_besar'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Engkel Besar')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('percent_brix');

        $data['percent_brix_gandeng'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Gandeng')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('percent_brix');

        $data['percent_brix_all'] = self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('percent_brix');

        $data['percent_pol_engkel_kecil'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Engkel Kecil')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('percent_pol');

        $data['percent_pol_engkel_besar'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Engkel Besar')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('percent_pol');

        $data['percent_pol_gandeng'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Gandeng')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('percent_pol');

        $data['percent_pol_all'] = self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('percent_pol');

        $data['yield_engkel_kecil'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Engkel Kecil')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('yield');

        $data['yield_engkel_besar'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Engkel Besar')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('yield');

        $data['yield_gandeng'] = self::where('created_at', '>=', $time['current'])
            ->where('vehicle', 'Gandeng')
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('yield');

        $data['yield_all'] = self::where('created_at', '>=', $time['current'])
            ->where('created_at', '<', $time['tomorrow'])
            ->avg('yield');

        return $data;
    }

    public static function posAccumulation($time)
    {
        $post = Outpost::select('name')->get();
        for($i = 0; $i < count($post); $i++)
        {
            $post[$i]->yield_ek = Core_sample::where('outpost', $post[$i]->name)
                ->where('vehicle', 'Engkel Kecil')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');

            $post[$i]->yield_eb = Core_sample::where('outpost', $post[$i]->name)
                ->where('vehicle', 'Engkel Besar')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');

            $post[$i]->yield_gd = Core_sample::where('outpost', $post[$i]->name)
                ->where('vehicle', 'Gandeng')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');

            $post[$i]->yield_all = Core_sample::where('outpost', $post[$i]->name)
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');
        }
        return $post;
    }

    public static function kudAccumulation($time)
    {
        $kud = Cooperative::select('name')->get();
        for($i = 0; $i < count($kud); $i++)
        {
            $kud[$i]->yield_ek = Core_sample::where('cooperative', $kud[$i]->name)
                ->where('vehicle', 'Engkel Kecil')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');

            $kud[$i]->yield_eb = Core_sample::where('cooperative', $kud[$i]->name)
                ->where('vehicle', 'Engkel Besar')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');
                
            $kud[$i]->yield_gd = Core_sample::where('cooperative', $kud[$i]->name)
                ->where('vehicle', 'Gandeng')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');
                
            $kud[$i]->yield_all = Core_sample::where('cooperative', $kud[$i]->name)
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');
        }
        return $kud;
    }

    public static function programAccumulation($time)
    {
        $program = Program::select('name')->get();
        for($i = 0; $i < count($program); $i++)
        {
            $program[$i]->yield_ek = Core_sample::where('program', $program[$i]->name)
                ->where('vehicle', 'Engkel Kecil')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');

            $program[$i]->yield_eb = Core_sample::where('program', $program[$i]->name)
                ->where('vehicle', 'Engkel Besar')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');
                
            $program[$i]->yield_gd = Core_sample::where('program', $program[$i]->name)
                ->where('vehicle', 'Gandeng')
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');
                
            $program[$i]->yield_all = Core_sample::where('program', $program[$i]->name)
                ->where('created_at', '>=', $time['current'])
                ->where('created_at', '<', $time['tomorrow'])
                ->avg('yield');
        }
        return $program;
    }

}

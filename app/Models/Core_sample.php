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
        'admin',
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


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cooperative;
use App\Models\Outpost;
use App\Models\Program;
use App\Models\Saccharomat;
use App\Models\Register;

class Core_big extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'batch',
        'register',
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
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveCorrected()
    {
        return self::where('correction', 1)->limit(1000)->orderBy('core_bigs.id', 'desc')->get();
    }

    public static function serveUnverificated()
    {
        return self::where('is_verified', 0)->limit(1000)->orderBy('core_bigs.id', 'desc')->get();
    }

    public static function validateRequest($request)
    {
        $register = Register::findRegister($request->barcode);
        $cooperative = Cooperative::getCooperative($register);
        $outpost = Outpost::getOutpost($register);
        $program = Program::getProgram($register);
        $yield = Saccharomat::findYield($request->percent_pol, $request->percent_brix);
        return $data = [
            'register' => $register,
            'cooperative' => $cooperative,
            'outpost' => $outpost,
            'program' => $program,
            'yield' => $yield,
        ];
        return $data;
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Core_sample;
use App\Models\Cooperative;
use App\Models\Outpost;
use App\Models\Program;
use App\Models\Saccharomat;
use App\Models\Register;

class Rafaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'spot',
        'register',
        'vehicle',
        'cooperative',
        'outpost',
        'program',
        'score',
        'analyst',
    ];

    public static function validateRequest($request)
    {
        $vehicle = Core_sample::findVehicle($request->barcode);
        $register = Register::findRegister($request->barcode);
        $cooperative = Cooperative::getCooperative($register);
        $outpost = Outpost::getOutpost($register);
        $program = Program::getProgram($register);

        return $data = [
            'barcode' => $request->barcode,
            'vehicle' => $vehicle,
            'register' => $register,
            'cooperative' => $cooperative,
            'outpost' => $outpost,
            'program' => $program,
        ];
    }

    public static function generateScore($request)
    {
        if($request->pucuk < 30)
            $score = 'A';
        else
            $score = 'B';
        return $score;
    }
    
}

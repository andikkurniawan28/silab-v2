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
        'truck_number',
        'farmer',
        'pucuk',
        'sogolan',
        'daduk',
        'akar',
        'tali',
        'terbakar',
        'muda',
        'lelesan',
        'score',
        'analyst',
        'image1',
        'image2',
        'image3',
    ];

    public static function validateRequest($request)
    {
        $barcode_info = Register::findBarcodeInfo($request->barcode);
        $register = $barcode_info['register'];
        $truck_number = $barcode_info['nopol'];
        $farmer = $barcode_info['nama_petani'];
        
        $vehicle = Core_sample::findVehicle($request->barcode);
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
            'truck_number' => $truck_number,
            'farmer' => $farmer,
        ];
    }

    public static function generateScore($request)
    {
        if($request->tebu_muda > 0)
        $score = "F";
        elseif($request->lelesan > 0)
        $score = "F";
        elseif($request->terbakar > 1)
        $score = "F";
        elseif($request->pucuk > 1 AND $request->sogolan > 1)
        $score = "E";
        elseif(
            $request->pucuk == 0 AND 
            $request->sogolan == 0 AND 
            $request->daduk == 0 AND 
            $request->akar == 0 AND 
            $request->tali_pucuk == 0 AND 
            $request->terbakar == 0 AND 
            $request->tebu_muda == 0 AND 
            $request->lelesan == 0
        )
        $score = "A";
        else
        {
            
        }

        return $score;
    }
    
}

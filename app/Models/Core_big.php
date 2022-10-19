<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cooperative;
use App\Models\Outpost;
use App\Models\Program;
use App\Models\Saccharomat;

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
        $register = self::findRegister($request->barcode);
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

    public static function findRegister($barcode)
    {
        $url = 'http://192.168.20.45:8111/getregister/';
        $request_url = $url.$barcode;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ 'authorization:PGKBA2022' ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        if (array_key_exists("register", $data))
        {
            return $data['register'];
        }
        else return NULL;
    }


}

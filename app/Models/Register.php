<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

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

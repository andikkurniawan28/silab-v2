<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    use HasFactory;

    public static function findBarcodeInfo($barcode)
    {
        $url = 'http://192.168.20.45:8111/getregisterinfo/';
        $request_url = $url.$barcode;
        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, [ 'authorization:PGKBA2022' ]);
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        if($response != 'Internal Server Error')
            $data = json_decode($response, true);
        else
        {
            $data['register'] = NULL;
            $data['nopol'] = NULL;
            $data['nama_petani'] = NULL;
        }

        return $data;
    }
}

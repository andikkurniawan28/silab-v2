<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rain;

class RainController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($kud, $humidity, $cahaya, $curah_hujan)
    {
        $jam = date('H');
        if($jam >= 9 AND $jam < 16)
        {
            Rain::insert([
                'cooperative_id' => $kud,
                'humidity' => $humidity,
                'cahaya' => $cahaya,
                'curah_hujan' => $curah_hujan,
            ]);
        }
    }
}

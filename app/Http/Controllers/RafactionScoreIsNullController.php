<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Rafaction;

class RafactionScoreIsNullController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($rafaction_id)
    {
        $data = Rafaction::where('id', $rafaction_id)->where('score', NULL)->count();
        $nomor_meja = Rafaction::find($rafaction_id)->get()->last()->spot;
        if($data == 0)
            return redirect()->route('meja_tebu', $nomor_meja);
        else
            return redirect()->back();
    }
}

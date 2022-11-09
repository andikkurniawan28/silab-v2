<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rafaction;

class WaitingController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($nomor_meja, $rafaction_id)
    {
        if ($nomor_meja > 5 || $nomor_meja < 1)
        {
            return redirect()->back()->with('error', 'Error : Meja Tebu '.$nomor_meja.' tidak ada.');
        }
        else
        {
            $data = Rafaction::where('id', $rafaction_id)->get()->last();
            return view('meja_tebu.waiting', compact('nomor_meja', 'rafaction_id', 'data'));
        }
    }
}

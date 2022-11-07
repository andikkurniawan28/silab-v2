<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MejaTebuController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($nomor_meja)
    {
        if ($nomor_meja > 5 || $nomor_meja < 1)
        {
            return redirect()->back()->with('success', 'Meja Tebu '.$nomor_meja.' tidak ada.');
        }
        else
        {
            return view('meja_tebu.index', compact('nomor_meja'));
        }
    }
}

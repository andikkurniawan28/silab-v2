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
        return view('meja_tebu.index', compact('nomor_meja'));
    }
}

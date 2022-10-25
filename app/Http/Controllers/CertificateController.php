<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certificate;

class CertificateController extends Controller
{
    public function mollasesCertificate(Request $request)
    {
        $time = self::determineTimeRange($request);
        $data = Certificate::serveMollasesCertificate($time);
        // return $data['t1'][0];
        return view('documentation.certificate.mollases_certificate', compact('request', 'data'));
    }

    public function kapurCertificate(Request $request)
    {
        $time = self::determineTimeRange($request);
        $data = Certificate::serveKapurCertificate($time);
        return view('documentation.certificate.kapur_certificate', compact('request', 'data'));
    }

    public function determineTimeRange($request)
    {
        $data['current'] = $request->date.' 05:00:00';
        $data['tomorrow'] = date('Y-m-d H:i', strtotime($data['current'] . "+24 hours"));
        return $data;
    }
}

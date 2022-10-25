<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sample;

class Certificate extends Model
{
    use HasFactory;

    public static function serveMollasesCertificate($time)
    {
        $data['t1'] = self::getMollasesData($time, 'Tetes Tangki 1');
        $data['t2'] = self::getMollasesData($time, 'Tetes Tangki 2');
        $data['t3'] = self::getMollasesData($time, 'Tetes Tangki 3');
        return $data;
    }

    public static function serveKapurCertificate($time)
    {
        $data['sedar'] = self::getKapurData($time, 'Kapur PT Sedar');
        return $data;
    }

    public static function getMollasesData($time, $material)
    {
        return Sample::join('materials', 'samples.material_id', 'materials.id')
        ->leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
        ->leftjoin('specials', 'samples.id', 'specials.sample_id')
        ->where('materials.name', $material)
        ->where('samples.created_at', '>=', $time['current'])
        ->where('samples.created_at', '<', $time['tomorrow'])
        ->select(
            'samples.created_at',
            'materials.name',
            'saccharomats.percent_brix',
            'specials.tsai',
            'specials.optical_density',
        )->get();
    }

    public static function getKapurData($time, $material)
    {
        return Sample::join('materials', 'samples.material_id', 'materials.id')
        ->leftjoin('specials', 'samples.id', 'specials.sample_id')
        ->where('materials.name', $material)
        ->where('samples.created_at', '>=', $time['current'])
        ->where('samples.created_at', '<', $time['tomorrow'])
        ->select(
            'samples.created_at',
            'materials.name',
            'specials.calcium',
        )->get();
    }

}

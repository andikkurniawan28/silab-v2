<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factor;
use Illuminate\Http\Request;

class Saccharomat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'sample_id',
        'percent_brix',
        'percent_pol',
        'pol',
        'purity',
        'yield',
        'percent_brix_origin',
        'percent_pol_origin',
        'pol_origin',
        'purity_origin',
        'yield_origin',
        'admin',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public static function serveAll()
    {
        return self::join('samples', 'saccharomats.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->select(
                'saccharomats.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('saccharomats.id', 'desc')
            ->get();
    }

    public static function serveCorrected()
    {
        return self::join('samples', 'saccharomats.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('correction', 1)
            ->select(
                'saccharomats.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('saccharomats.id', 'desc')
            ->get();
    }

    public static function serveUnverificated()
    {
        return self::join('samples', 'saccharomats.sample_id', 'samples.id')
            ->join('materials', 'samples.material_id', 'materials.id')
            ->where('is_verified', 0)
            ->select(
                'saccharomats.*',
                'materials.name as material_name',
            )
            ->limit(1000)
            ->orderBy('saccharomats.id', 'desc')
            ->get();
    }

    public static function findPurity($percent_pol, $percent_brix)
    {
        return ($percent_pol/$percent_brix * 100);
    }

    public static function findYield($percent_pol, $percent_brix)
    {
        $mollases_factor = Factor::findMollasesFactor();
        $yield_factor = Factor::findRendemenFactor();
        $yield = $yield_factor * ($percent_pol - $mollases_factor * ($percent_brix - $percent_pol));
        return $yield;
    }
    
    public static function implementFormula($status, $percent_pol, $percent_brix, $pol)
    {
        if($status == 1)
        {
            $purity = self::findPurity($percent_pol, $percent_brix);
            $yield = self::findYield($percent_pol, $percent_brix);
            return $data = [
                'purity' => $purity,
                'yield' => $yield,
            ];
        }
        elseif($status == 0)
        {
            if($percent_pol == '' || $percent_brix == '')
            {
                return $data = [
                    'purity' => NULL,
                    'yield' => NULL,
                ];
            }
            else
            {
                $purity = self::findPurity($percent_pol, $percent_brix);
                return $data = [ 
                    'purity' => $purity, 
                    'yield' => NULL, 
                ];
            }
        }
    }

    public static function findPolCount($sample_id)
    {
        return self::where('sample_id', $sample_id)->count();
    }

    public static function findPolBySampleId($sample_id)
    {
        return self::where('sample_id', $sample_id)->get()->first()->pol;
    }

}

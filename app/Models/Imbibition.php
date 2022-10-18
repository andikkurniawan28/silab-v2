<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Factor;

class Imbibition extends Model
{
    use HasFactory;
    protected $fillable = [
        'totalizer',
        'flow',
        'admin',
    ];
    
    public static function countImbibition($request)
    {
        $count = self::count();
        if($count != 0)
        {
            $totalizer_latest = self::get()->last()->totalizer;
            $flow = self::findFlow($totalizer_latest, $request->totalizer);
        }
        else
        {
            $flow = 0;
        }
        return $data = [
            'flow' => $flow,
        ];
    }

    public static function editImbibition($request, $id)
    {
        $totalizer_latest = self::where('id', '<', $id)->get()->last()->totalizer;
        $flow = self::findFlow($totalizer_latest, $request->totalizer);
        return $data = [
            'flow' => $flow,
        ];
    }

    public static function findFlow($totalizer_old, $totalizer_new)
    {
        $factor = Factor::findImbibitionFactor();
        return $factor * ($totalizer_new - $totalizer_old);
    }
}

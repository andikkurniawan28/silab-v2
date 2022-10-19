<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cooperative extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'admin',
    ];

    public static function getCooperative($register)
    {
        if($register != NULL)
        {
            $code = substr($register, 0, 1);
            $count = self::where('code', $code)->count();
            if($count > 0)
                $cooperative = self::where('code', $code)->get()->first()->name;
            else
                $cooperative = NULL;
        }
        else $cooperative = NULL;
        
        return $cooperative;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outpost extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'admin',
    ];

    public static function getOutpost($register)
    {
        if($register != NULL)
        {
            $code = substr($register, 1, 1);
            $count = self::where('code', $code)->count();
            if($count > 0)
                $outpost = self::where('code', $code)->get()->first()->name;
            else
                $outpost = NULL;
        }
        else $outpost = NULL;

        return $outpost;
    }
}

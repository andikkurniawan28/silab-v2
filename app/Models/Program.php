<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'code',
        'name',
        'admin',
    ];

    public static function getProgram($register)
    {
        if($register != NULL)
        {
            $code = substr($register, 2, 1);
            $count = self::where('code', $code)->count();
            if($count > 0)
                $program = self::where('code', $code)->get()->first()->name;
            else
                $program = NULL;
        }
        else $program = NULL;
        
        return $program;
    }
}

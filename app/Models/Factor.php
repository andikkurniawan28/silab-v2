<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factor extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'value',
        'admin',
    ];

    public static function findMollasesFactor()
    {
        return self::where('name', 'Mollases')->get()->first()->value;
    }

    public static function findRendemenFactor()
    {
        return self::where('name', 'Rendemen')->get()->first()->value;
    }

    public static function findRawJuiceFactor()
    {
        return self::where('name', 'Raw Juice')->get()->first()->value;
    }
}

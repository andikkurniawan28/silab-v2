<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reject extends Model
{
    use HasFactory;

    protected $fillable = [
        'weight',
        'weight_origin',
        'admin',
        'corrector',
        'correction',
    ];

    public static function serveCorrected()
    {
        return self::where('correction', 1)
            ->limit(1000)
            ->orderBy('id', 'desc')
            ->get();
    }
}

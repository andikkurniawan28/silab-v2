<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Umum extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_id',
        'cao',
        'ph',
        'turbidity',
        'temperature',
        'cao_origin',
        'ph_origin',
        'turbidity_origin',
        'temperature_origin',
        'analyst',
        'master',
        'corrector',
        'is_verified',
        'correction',
    ];

    public function sample()
    {
        return $this->belongsTo(Sample::class);
    }

    public static function serveCorrected()
    {
        return self::where('correction', 1)->get();
    }

    public static function serveUnverificated()
    {
        return self::where('is_verified', 0)->get();
    }
}

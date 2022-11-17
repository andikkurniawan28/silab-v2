<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moisture extends Model
{
    use HasFactory;

    protected $fillable = [
        'sample_id',
        'moisture',
        'moisture_origin',
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

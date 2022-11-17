<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'admin',
    ];

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function sample()
    {
        return $this->hasMany(Sample::class);
    }
}

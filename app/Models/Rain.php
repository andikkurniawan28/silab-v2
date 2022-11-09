<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cooperative;

class Rain extends Model
{
    use HasFactory;
    protected $fillable = [
        'cooperative_id',
        'humidity',
        'cahaya',
        'curah_hujan',
    ];

    public static function serveData()
    {
        $date = date('Y-m-d 5:00');
        $max = date('Y-m-d H:i', strtotime($date . "+24 hours"));
        $kud = Cooperative::select('id', 'name')->get();
        for($i=0; $i<count($kud); $i++)
        {
            $kud[$i]->humidity = Rain::where('cooperative_id', $kud[$i]->id)
                ->where('created_at', '>=', $date)
                ->where('created_at', '<', $max)
                ->sum('humidity');

            $kud[$i]->cahaya = Rain::where('cooperative_id', $kud[$i]->id)
                ->where('created_at', '>=', $date)
                ->where('created_at', '<', $max)
                ->sum('cahaya');

            $kud[$i]->curah_hujan = Rain::where('cooperative_id', $kud[$i]->id)
                ->where('created_at', '>=', $date)
                ->where('created_at', '<', $max)
                ->sum('curah_hujan');
        }
        return $kud;
    }
}

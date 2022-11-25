<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sample;

class Method extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'admin',
    ];

    public static function serveByMethodId($method_id, $material_id, $limit)
    {
        switch($method_id)
        {
            case 1 :
                $data = Sample::leftjoin('coloromats', 'samples.id', 'coloromats.sample_id')
                    ->leftjoin('moistures', 'samples.id', 'moistures.sample_id')
                    ->leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->leftjoin('sugars', 'samples.id', 'sugars.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'samples.station_id',
                        'coloromats.icumsa',
                        'moistures.moisture',
                        'saccharomats.percent_brix',
                        'saccharomats.percent_pol',
                        'saccharomats.purity',
                        'sugars.sulphur',
                        'sugars.diameter',
                        'coloromats.is_verified as coloromat_verification',
                        'moistures.is_verified as moisture_verification',
                        'saccharomats.is_verified as saccharomat_verification',
                        'sugars.is_verified as sugar_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 2 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.percent_brix',
                        'saccharomats.percent_pol',
                        'saccharomats.pol',
                        'saccharomats.purity',
                        'saccharomats.is_verified as saccharomat_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 3 :
                $data = Sample::leftjoin('baggases', 'samples.id', 'baggases.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'baggases.corrected_pol',
                        'baggases.dry',
                        'baggases.water',
                        'baggases.is_verified as baggase_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 4 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->leftjoin('coloromats', 'samples.id', 'coloromats.sample_id')
                    ->leftjoin('umums', 'samples.id', 'umums.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.percent_brix',
                        'saccharomats.percent_pol',
                        'saccharomats.pol',
                        'saccharomats.purity',
                        'coloromats.icumsa',
                        'umums.ph',
                        'umums.cao',
                        'umums.turbidity',
                        'saccharomats.is_verified as saccharomat_verification',
                        'coloromats.is_verified as coloromat_verification',
                        'umums.is_verified as umum_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 5 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->leftjoin('coloromats', 'samples.id', 'coloromats.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.percent_brix',
                        'saccharomats.percent_pol',
                        'saccharomats.pol',
                        'saccharomats.purity',
                        'coloromats.icumsa',
                        'saccharomats.is_verified as saccharomat_verification',
                        'coloromats.is_verified as coloromat_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 6 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->leftjoin('specials', 'samples.id', 'specials.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.percent_brix',
                        'specials.tsai',
                        'specials.optical_density',
                        'saccharomats.is_verified as saccharomat_verification',
                        'specials.is_verified as special_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 7 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->leftjoin('moistures', 'samples.id', 'moistures.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.pol',
                        'moistures.moisture',
                        'saccharomats.is_verified as saccharomat_verification',
                        'moistures.is_verified as moisture_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 8 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->leftjoin('baggases', 'samples.id', 'baggases.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.pol',
                        'baggases.water',
                        'saccharomats.is_verified as saccharomat_verification',
                        'baggases.is_verified as baggase_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 9 :
                $data = Sample::leftjoin('boilers', 'samples.id', 'boilers.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'boilers.tds',
                        'boilers.ph',
                        'boilers.hardness',
                        'boilers.phospate',
                        'boilers.is_verified as boiler_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 10 :
                $data = Sample::leftjoin('coloromats', 'samples.id', 'coloromats.sample_id')
                    ->leftjoin('moistures', 'samples.id', 'moistures.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'coloromats.icumsa',
                        'moistures.moisture',
                        'coloromats.is_verified as coloromat_verification',
                        'moistures.is_verified as moisture_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 11 :
                $data = Sample::leftjoin('specials', 'samples.id', 'specials.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'specials.calcium',
                        'specials.is_verified as special_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 12 :
                $data = Sample::leftjoin('specials', 'samples.id', 'specials.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'specials.preparation_index',
                        'specials.fiber',
                        'specials.is_verified as special_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 13 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.percent_brix',
                        'saccharomats.percent_pol',
                        'saccharomats.pol',
                        'saccharomats.purity',
                        'saccharomats.yield',
                        'saccharomats.is_verified as saccharomat_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 14 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->leftjoin('umums', 'samples.id', 'umums.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.percent_brix',
                        'umums.ph',
                        'umums.temperature',
                        'saccharomats.is_verified as saccharomat_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 15 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                ->leftjoin('coloromats', 'samples.id', 'coloromats.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'samples.volume',
                        'samples.pan',
                        'samples.reef',
                        'saccharomats.percent_brix',
                        'saccharomats.percent_pol',
                        'saccharomats.purity',
                        'coloromats.icumsa',
                        'saccharomats.is_verified as saccharomat_verification',
                        'coloromats.is_verified as coloromat_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 16 :
                $data = Sample::leftjoin('saccharomats', 'samples.id', 'saccharomats.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'saccharomats.percent_brix',
                        'saccharomats.is_verified as saccharomat_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 17 :
                $data = Sample::leftjoin('boilers', 'samples.id', 'boilers.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'boilers.tds',
                        'boilers.ph',
                        'boilers.is_verified as boiler_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;

            case 18 :
                $data = Sample::leftjoin('boilers', 'samples.id', 'boilers.sample_id')
                    ->where('samples.material_id', $material_id)
                    ->select(
                        'samples.id',
                        'samples.created_at',
                        'boilers.tds',
                        'boilers.ph',
                        'boilers.hardness',
                        'boilers.is_verified as boiler_verification',
                    )
                    ->limit($limit)
                    ->orderBy('samples.id', 'desc')
                    ->get();
            break;
        }
        return $data;
    }

    public function material()
    {
        return $this->hasMany(Material::class);
    }

    public function sample()
    {
        return $this->hasMany(Sample::class);
    }

    public function coloromat()
    {
        return $this->hasOne(Coloromat::class);
    }
}

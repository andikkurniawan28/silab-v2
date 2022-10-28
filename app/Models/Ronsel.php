<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sample;
use App\Models\Material;

class Ronsel extends Model
{
    use HasFactory;

    public static function determineTimeRange()
    {
        $time['today'] = date('Y-m-d 5:00');
        $time['tomorrow'] = date('Y-m-d H:i', strtotime($time['today'] . "+24 hours"));
        $time['yesterday'] = date('Y-m-d H:i', strtotime($time['today'] . "-24 hours"));
        return $time;
    }

    public static function serveMasakan()
    {
        $time = self::determineTimeRange();
        $materials = Material::where('name', 'like', 'Masakan %')->select('id', 'name')->get();
        for($i=0; $i<count($materials); $i++)
        {
            $materials[$i]['volume_sd_hari_ini'] = self::serveRecapVolume($materials[$i]['id']);
            $materials[$i]['volume_hari_ini'] = self::serveRecapVolumeTodayByTime($materials[$i]['id'], $time);
            $materials[$i]['volume_kemarin'] = self::serveRecapVolumeYesterdayByTime($materials[$i]['id'], $time);
            $materials[$i]['qty_sd_hari_ini'] = self::serveRecapQuantity($materials[$i]['id']);
            $materials[$i]['qty_hari_ini'] = self::serveRecapQuantityTodayByTime($materials[$i]['id'], $time);
            $materials[$i]['qty_kemarin'] = self::serveRecapQuantityYesterdayByTime($materials[$i]['id'], $time);
        }
        return $materials;
    }

    public static function serveRecapVolume($material_id)
    {
        return Sample::where('material_id', $material_id)
            ->sum('volume');
    }

    public static function serveRecapVolumeTodayByTime($material_id, $time)
    {
        return Sample::where('material_id', $material_id)
            ->where('created_at', '>=', $time['today'])
            ->where('created_at', '<', $time['tomorrow'])
            ->sum('volume');
    }

    public static function serveRecapVolumeYesterdayByTime($material_id, $time)
    {
        return Sample::where('material_id', $material_id)
            ->where('created_at', '>=', $time['yesterday'])
            ->where('created_at', '<', $time['today'])
            ->sum('volume');
    }

    public static function serveRecapQuantity($material_id)
    {
        return Sample::where('material_id', $material_id)
            ->count('id');
    }

    public static function serveRecapQuantityTodayByTime($material_id, $time)
    {
        return Sample::where('material_id', $material_id)
            ->where('created_at', '>=', $time['today'])
            ->where('created_at', '<', $time['tomorrow'])
            ->count('id');
    }

    public static function serveRecapQuantityYesterdayByTime($material_id, $time)
    {
        return Sample::where('material_id', $material_id)
            ->where('created_at', '>=', $time['yesterday'])
            ->where('created_at', '<', $time['today'])
            ->count('id');
    }

}

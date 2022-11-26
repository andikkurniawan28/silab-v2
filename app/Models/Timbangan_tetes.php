<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Timbangan_tetes extends Model
{
    use HasFactory;

    public static function determineTimeRange()
    {
        $data['now'] = date('Y-m-d');
        $data['now2'] = date('Y-m-d H:i');
        $data['today'] = date('Y-m-d 5:00:00');
        $data['yesterday'] = date('Y-m-d H:i', strtotime($data['today'] . "-24 hours"));
        $data['tommorow'] = date('Y-m-d H:i', strtotime($data['today'] . "+24 hours"));
        $data['today_afternoon'] = date('Y-m-d 13:00:00');
        $data['today_night'] = date('Y-m-d 21:00:00');
        $data['yesterday_afternoon'] = date('Y-m-d H:i', strtotime($data['today_afternoon'] . "-24 hours"));
        $data['yesterday_night'] = date('Y-m-d H:i', strtotime($data['today_night'] . "-24 hours"));
        return $data;
    }

    public function totalBobotTetesDalamShift($shift)
    {
        $time = self::determineTimeRange();
        switch($shift){
            case 1 : $time_min = $time['yesterday']; $time_max = $time['yesterday_afternoon']; break;
            case 2 : $time_min = $time['yesterday_afternoon']; $time_max = $time['yesterday_night']; break;
            case 3 : $time_min = $time['yesterday_night']; $time_max = $time['today']; break;
            case 4 : $time_min = $time['today']; $time_max = $time['today_afternoon']; break;
            case 5 : $time_min = $time['today_afternoon']; $time_max = $time['today_night']; break;
            case 6 : $time_min = $time['today_night']; $time_max = $time['tommorow']; break;
            case 7 : $time_min = $time['yesterday']; $time_max = $time['today']; break;
            case 8 : $time_min = $time['today']; $time_max = $time['tommorow']; break;
        }
        $data = DB::connection('tetes')->table('tetes')->where('time', '>=', $time_min)->where('time', '<', $time_max)->sum('netto');
        return $data;
    }

    public function rerataBjDalamShift($shift)
    {
        $time = self::determineTimeRange();
        switch($shift){
            case 1 : $time_min = $time['yesterday']; $time_max = $time['yesterday_afternoon']; break;
            case 2 : $time_min = $time['yesterday_afternoon']; $time_max = $time['yesterday_night']; break;
            case 3 : $time_min = $time['yesterday_night']; $time_max = $time['today']; break;
            case 4 : $time_min = $time['today']; $time_max = $time['today_afternoon']; break;
            case 5 : $time_min = $time['today_afternoon']; $time_max = $time['today_night']; break;
            case 6 : $time_min = $time['today_night']; $time_max = $time['tommorow']; break;
            case 7 : $time_min = $time['yesterday']; $time_max = $time['today']; break;
            case 8 : $time_min = $time['today']; $time_max = $time['tommorow']; break;
        }
        $data = DB::connection('tetes')->table('tetes')->where('time', '>=', $time_min)->where('time', '<', $time_max)->avg('density');
        return $data;
    }

    public function jumlahChargeDalamShift($shift)
    {
        $time = self::determineTimeRange();
        switch($shift){
            case 1 : $time_min = $time['yesterday']; $time_max = $time['yesterday_afternoon']; break;
            case 2 : $time_min = $time['yesterday_afternoon']; $time_max = $time['yesterday_night']; break;
            case 3 : $time_min = $time['yesterday_night']; $time_max = $time['today']; break;
            case 4 : $time_min = $time['today']; $time_max = $time['today_afternoon']; break;
            case 5 : $time_min = $time['today_afternoon']; $time_max = $time['today_night']; break;
            case 6 : $time_min = $time['today_night']; $time_max = $time['tommorow']; break;
            case 7 : $time_min = $time['yesterday']; $time_max = $time['today']; break;
            case 8 : $time_min = $time['today']; $time_max = $time['tommorow']; break;
        }
        $data =  DB::connection('tetes')->table('tetes')->where('time', '>=', $time_min)->where('time', '<', $time_max)->count('id');
        return $data;
    }

    public function bobotSampaiDenganKemarin($time){
        return DB::connection('tetes')->table('tetes')->where('time', '<=', $time['yesterday'])->sum('netto');
    }

    public function bobotSampaiDenganHariIni($time){
        return DB::connection('tetes')->table('tetes')->where('time', '<=', $time['today'])->sum('netto');
    }

    public function bobotSampaiDenganSaatIni($time){
        return DB::connection('tetes')->table('tetes')->where('time', '<=', $time['now2'])->sum('netto');
    }

    public function bobotPerJam($hour){
        return DB::connection('tetes')->table('tetes')->where('time', '>=', date('Y-m-d '.$hour.':00:00'))->where('time', '<',  date('Y-m-d H:i', strtotime(date('Y-m-d '.$hour.':00:00') . "+1 hours")))->sum('netto');
    }

    public function bjPerJam($hour){
        return DB::connection('tetes')->table('tetes')->where('time', '>=', date('Y-m-d '.$hour.':00:00'))->where('time', '<',  date('Y-m-d H:i', strtotime(date('Y-m-d '.$hour.':00:00') . "+1 hours")))->avg('density');
    }

    public function getLatest(){
        return DB::connection('tetes')->table('tetes')->select('*')->limit(1000)->orderBy('time', 'desc')->get();
    }

    public function serveTetes()
    {
        $time = self::determineTimeRange();

        $data['bobot_sd_kemarin'] = self::bobotSampaiDenganKemarin($time);
        $data['bobot_sd_hari_ini'] = self::bobotSampaiDenganHariIni($time);
        $data['bobot_sd_saat_ini'] = self::bobotSampaiDenganSaatIni($time);

        for($i=1; $i<=8; $i++){
            $data['bobot']['shift'][$i] = self::totalBobotTetesDalamShift($i);
            $data['bj']['shift'][$i] = self::rerataBjDalamShift($i);
            $data['charge']['shift'][$i] = self::jumlahChargeDalamShift($i);
        }

        for($i=0; $i<24; $i++){
            $data['bobot_jam'][$i] = self::bobotPerJam($i);
            $data['bj_jam'][$i] = self::bjPerJam($i);
        }

        $data['latest'] = self::getLatest();

        return $data;
    }
}

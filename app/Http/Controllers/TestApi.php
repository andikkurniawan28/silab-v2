<?php

namespace App\Http\Controllers;

use App\Models\Outpost;
use App\Models\Program;
use App\Models\Register;
use App\Models\Cooperative;
use App\Models\Core_sample;
use Illuminate\Http\Request;

class TestApi extends Controller
{
    public function __invoke($nomor_bor)
    {
        $id = Core_sample::getIdViaNomorBorForHmi($nomor_bor);
        $barcode = Core_sample::where('id', $id)->get()->last()->barcode;

        $data = Register::findBarcodeInfo($barcode);
        $register = $data['register'];
        $truck_number = $data['nopol'];
        $farmer = $data['nama_petani'];

        $vehicle = Core_sample::findVehicle($barcode);
        $cooperative = Cooperative::getCooperative($register);
        $outpost = Outpost::getOutpost($register);
        $program = Program::getProgram($register);

        $query = Core_sample::where('id', $id)->update([
            'barcode' => $barcode,
            'register' => $register,
            'truck_number' => $truck_number,
            'farmer' => $farmer,
            'vehicle' => $vehicle,
            'cooperative' => $cooperative,
            'outpost' => $outpost,
            'program' => $program,
        ]);

        return $query;
    }
}

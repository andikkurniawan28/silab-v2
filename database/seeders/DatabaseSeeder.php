<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\Method;
use App\Models\Role;
use App\Models\User;
use App\Models\Factor;
use App\Models\Material;
use App\Models\Cooperative;
use App\Models\Outpost;
use App\Models\Program;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $stations = [
            ['name' => 'Raw Sugar', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Gilingan', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Pemurnian', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Penguapan', 'admin' => 'Andik Kurniawan'],
            ['name' => 'DRK', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Masakan', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Stroop', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Gula', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Tangki Tetes', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Ketel', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Packer', 'admin' => 'Andik Kurniawan'],
        ];
        Station::insert($stations);

        $methods = [
            ['name' => "Icumsa, Moisture, Brix, Pol, HK, SO2, BJB", 'admin' => 'Andik Kurniawan'],
            ['name' => "Brix, Pol, Pol Baca, HK", 'admin' => 'Andik Kurniawan'],
            ['name' => "Pol Koreksi, Zat Kering, Air", 'admin' => 'Andik Kurniawan'],
            ['name' => "Brix, Pol, Pol Baca, HK, Icumsa, pH, CaO, Turbidity", 'admin' => 'Andik Kurniawan'],
            ['name' => "Brix, Pol, Pol Baca, HK, Icumsa", 'admin' => 'Andik Kurniawan'],
            ['name' => "Brix, TSAI", 'admin' => 'Andik Kurniawan'],
            ['name' => "Pol Baca, Moisture", 'admin' => 'Andik Kurniawan'],
            ['name' => "Pol Baca, Air", 'admin' => 'Andik Kurniawan'],
            ['name' => "TDS, pH, Kesadahan, Phospat", 'admin' => 'Andik Kurniawan'],
            ['name' => "Icumsa, Moisture", 'admin' => 'Andik Kurniawan'],
            ['name' => "Kadar Kapur", 'admin' => 'Andik Kurniawan'],
            ['name' => "Preparation Index, Kadar Sabut", 'admin' => 'Andik Kurniawan'],
            ['name' => "Brix, Pol, Pol Baca, HK, Rendemen", 'admin' => 'Andik Kurniawan'],
            ['name' => "Brix, pH, Temperatur", 'admin' => 'Andik Kurniawan'],
        ];
        Method::insert($methods);

        $roles = [
            ['name' => 'Admin', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Mandor', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Analis', 'admin' => 'Andik Kurniawan'],
            ['name' => 'Pabrikasi', 'admin' => 'Andik Kurniawan'],
            ['name' => 'User', 'admin' => 'Andik Kurniawan'],
        ];
        Role::insert($roles);

        $users = [
            'role_id' => 1,
            'name' => 'Andik Kurniawan',
            'username' => 'andik',
            'password' => md5(110887),
            'admin' => 'Andik Kurniawan',
        ];
        User::insert($users);
        
        $factors = [
            [
                'name' => 'Mollases',
                'value' => 0.5,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Rendemen',
                'value' => 0.7,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Raw Juice',
                'value' => 0.85,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Imbibition',
                'value' => 1,
                'admin' => 'Andik Kurniawan',
            ],
        ];
        Factor::insert($factors);

        $materials = [
            ['name' => 'RS Kedatangan', 'station_id' => 1, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'RS Silo', 'station_id' => 1, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Gilingan 1', 'station_id' => 2, 'method_id' => 13, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Gilingan 2', 'station_id' => 2, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Gilingan 3', 'station_id' => 2, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Gilingan 4', 'station_id' => 2, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Gilingan 5', 'station_id' => 2, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Ampas Gilingan 1', 'station_id' => 2, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Ampas Gilingan 2', 'station_id' => 2, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Ampas Gilingan 3', 'station_id' => 2, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Ampas Gilingan 4', 'station_id' => 2, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Ampas Gilingan 5', 'station_id' => 2, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Tebu Cacah', 'station_id' => 2, 'method_id' => 12, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Mentah', 'station_id' => 3, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'NM Sulfitasi', 'station_id' => 3, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Tapis', 'station_id' => 3, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Encer', 'station_id' => 3, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Blotong RVF 1', 'station_id' => 3, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Blotong RVF 2', 'station_id' => 3, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Blotong RVF 3', 'station_id' => 3, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Blotong RVF 4', 'station_id' => 3, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Blotong RVF Timur', 'station_id' => 3, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Blotong RVF Barat', 'station_id' => 3, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Blotong RVF Truk', 'station_id' => 3, 'method_id' => 3, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Kental', 'station_id' => 4, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'NK Sulfitasi', 'station_id' => 4, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Pre-Evaporator 1', 'station_id' => 4, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Pre-Evaporator 2', 'station_id' => 4, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 1', 'station_id' => 4, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 2', 'station_id' => 4, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 3', 'station_id' => 4, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 4', 'station_id' => 4, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 5', 'station_id' => 4, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Remelter In', 'station_id' => 5, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Reaction Tank', 'station_id' => 5, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Carbonated', 'station_id' => 5, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Clear Liquor', 'station_id' => 5, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Cake Head', 'station_id' => 5, 'method_id' => 7, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Cake Mid', 'station_id' => 5, 'method_id' => 7, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Cake End', 'station_id' => 5, 'method_id' => 7, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan A', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan A Raw', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan C', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan D', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan R1', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan R2', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan R3', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'CVP C', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'CVP D', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Einwuurf C', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Einwuurf D', 'station_id' => 6, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Sogokan C', 'station_id' => 6, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Sogokan D', 'station_id' => 6, 'method_id' => 2, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Klare SHS', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Klare D', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Stroop A', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Stroop C', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'R1 Mol', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'R2 Mol', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Remelter A', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Remelter CD', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Tetes Puteran', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Magma RS', 'station_id' => 7, 'method_id' => 5, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula SHS', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula A', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula R1', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula R2', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula R3', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula A Raw', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula C', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula D1', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula D2', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Kristal RS', 'station_id' => 8, 'method_id' => 1, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Tetes Tangki 1', 'station_id' => 9, 'method_id' => 6, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Tetes Tangki 2', 'station_id' => 9, 'method_id' => 6, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Tetes Tangki 3', 'station_id' => 9, 'method_id' => 6, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Tetes Tandon', 'station_id' => 9, 'method_id' => 6, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Tetes Kumpulan', 'station_id' => 9, 'method_id' => 6, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Jiangxin Jianglin', 'station_id' => 10, 'method_id' => 9, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Yoshimine 1', 'station_id' => 10, 'method_id' => 9, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Yoshimine 2', 'station_id' => 10, 'method_id' => 9, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'WTP', 'station_id' => 10, 'method_id' => 9, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Daert JJ', 'station_id' => 10, 'method_id' => 9, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Daert Yoshimine1', 'station_id' => 10, 'method_id' => 9, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Daert Yoshimine2', 'station_id' => 10, 'method_id' => 9, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'HW', 'station_id' => 10, 'method_id' => 9, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula Produksi 50Kg', 'station_id' => 11, 'method_id' => 10, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Gula Produksi Retail', 'station_id' => 11, 'method_id' => 10, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Kapur PT Sedar', 'station_id' => 3, 'method_id' => 11, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Nira Kotor', 'station_id' => 3, 'method_id' => 14, 'admin' => 'Andik Kurniawan', ],
        ];
        Material::insert($materials);

        $cooperatives = [
            [ 'code' => '1', 'name' => 'Gondanglegi', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '2', 'name' => 'Pagelaran', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '3', 'name' => 'Dampit', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '4', 'name' => 'Bantur', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '5', 'name' => 'Donomulyo', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'A', 'name' => 'Lawang', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'B', 'name' => 'Dengkol', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'C', 'name' => 'Karangploso', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'D', 'name' => 'Jabung', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'E', 'name' => 'Pakis', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'F', 'name' => 'Tumpang Agung', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'G', 'name' => 'Poncokusumo', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'H', 'name' => 'Wagir', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'I', 'name' => 'Tajinan', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'J', 'name' => 'Bululawang', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'K', 'name' => 'Pakisaji', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'L', 'name' => 'Kromengan', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'M', 'name' => 'Wonosari', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'N', 'name' => 'Sumberpucung', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'O', 'name' => 'Ngajum', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'P', 'name' => 'Pagak', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'Q', 'name' => 'Kalipare', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'R', 'name' => 'Sri Sedono', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'S', 'name' => 'Rekanan Utara', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'T', 'name' => 'Kesamben', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'U', 'name' => 'Kedungkandang', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'V', 'name' => 'Kepanjen', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'W', 'name' => 'Sari Madu', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'X', 'name' => 'Rekanan Selatan Timur', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'Y', 'name' => 'Rekanan Selatan Barat', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'Z', 'name' => 'Tumpang Padita', 'admin' => 'Andik Kurniawan' ],
        ];
        Cooperative::insert($cooperatives);

        $outpost = [
            [ 'code' => 'O', 'name' => 'Banyuglugur', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'P', 'name' => 'Tongas', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'Q', 'name' => 'Turen', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'R', 'name' => 'Purwosari', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'S', 'name' => 'Ngoro', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'T', 'name' => 'Brongkos', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'U', 'name' => 'Talun', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'V', 'name' => 'Gumitir', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'W', 'name' => 'Gedok', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'X', 'name' => 'Peteng', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'Y', 'name' => 'Pagak', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'Z', 'name' => 'Pronojiwo', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '1', 'name' => 'Kromengan', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '2', 'name' => 'Jatikerto', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '4', 'name' => 'Pagelaran', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '5', 'name' => 'Singosari', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '6', 'name' => 'Ngajum', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '7', 'name' => 'Gondanglegi', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '8', 'name' => 'Donomulyo', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => '9', 'name' => 'Pakis', 'admin' => 'Andik Kurniawan' ],
        ];
        Outpost::insert($outpost);

        $programs = [
            [ 'code' => 'A', 'name' => 'Banyuwangi', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'B', 'name' => 'Jember', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'C', 'name' => 'Situbondo', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'D', 'name' => 'Bondowoso', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'E', 'name' => 'Probolinggo', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'F', 'name' => 'Lumajang', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'G', 'name' => 'Pasuruan', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'H', 'name' => 'Mojokerto', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'I', 'name' => 'Jombang', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'J', 'name' => 'Blitar', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'K', 'name' => 'Kredit DW TR', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'L', 'name' => 'Kediri', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'M', 'name' => 'Tulungagung', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'N', 'name' => 'Non Kredit DW', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'P', 'name' => 'Kebun Benih Datar', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'Q', 'name' => 'Kebun Benih Induk', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'R', 'name' => 'Kebun Benih Nenek', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'S', 'name' => 'Kebun Benih Pokok', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'T', 'name' => 'Kebun Persilangan P3GI', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'U', 'name' => 'Kebun Percobaan', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'V', 'name' => 'Kebun Pengenalan Jenis', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'X', 'name' => 'Tebu Giling TS', 'admin' => 'Andik Kurniawan' ],
            [ 'code' => 'Z', 'name' => 'SPT', 'admin' => 'Andik Kurniawan' ],
        ];
        Program::insert($programs);
    }
}

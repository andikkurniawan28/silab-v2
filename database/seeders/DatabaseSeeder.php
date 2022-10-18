<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Station;
use App\Models\Method;
use App\Models\Role;
use App\Models\User;
use App\Models\Factor;
use App\Models\Material;

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
    }
}

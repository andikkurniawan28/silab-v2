<?php

namespace Database\Seeders;

use App\Models\Dirt;
use App\Models\Role;
use App\Models\User;
use App\Models\Factor;
use App\Models\Method;
use App\Models\Outpost;
use App\Models\Program;
use App\Models\Station;
use App\Models\Material;
use App\Models\Cooperative;
use Illuminate\Database\Seeder;

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
            ['name' => "Brix, Pol, HK, Icumsa, HL", 'admin' => 'Andik Kurniawan'],
            ['name' => "Brix", 'admin' => 'Andik Kurniawan'],
            ['name' => "TDS, pH", 'admin' => 'Andik Kurniawan'],
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
            [
                'role_id' => 1,
                'name' => 'Andik Kurniawan',
                'username' => 'andik',
                'password' => bcrypt('andik987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Tri Hardjanto',
                'username' => 'tri',
                'password' => bcrypt('tri987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Tofan Andrew Irawan',
                'username' => 'tofan',
                'password' => bcrypt('tofan987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Ari Rahman Hakim',
                'username' => 'ari',
                'password' => bcrypt('ari987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Yudi Suyadi',
                'username' => 'yudi',
                'password' => bcrypt('yudi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Tutus Agustyn Rafzhanyani',
                'username' => 'tutus',
                'password' => bcrypt('tutus987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Dwi Wahyu Nugroho',
                'username' => 'dwi',
                'password' => bcrypt('dwi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Nico Aldy Dwi Putra',
                'username' => 'nico',
                'password' => bcrypt('nico987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Muslimin',
                'username' => 'muslimin',
                'password' => bcrypt('muslimin987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Riadi',
                'username' => 'riadi',
                'password' => bcrypt('riadi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Awaludin Rauf Firmansyah',
                'username' => 'awaludin',
                'password' => bcrypt('awaludin987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Satria Adi Wicaksono',
                'username' => 'satria',
                'password' => bcrypt('satria987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Achmad Zauzi Rifqi',
                'username' => 'zauzi',
                'password' => bcrypt('zauzi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Risky Anggara',
                'username' => 'risky',
                'password' => bcrypt('risky987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Moh. Arvan Dwi Fatahillah',
                'username' => 'arvan',
                'password' => bcrypt('arvan987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 1,
                'name' => 'Aris Dedi Setiawan',
                'username' => 'aris',
                'password' => bcrypt('aris987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 2,
                'name' => 'Bambang Sutejo',
                'username' => 'bambang',
                'password' => bcrypt('bambang987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 2,
                'name' => 'Muslimin 2',
                'username' => 'muslimin2',
                'password' => bcrypt('muslimin987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 2,
                'name' => 'Wahyu Santoso',
                'username' => 'wahyu',
                'password' => bcrypt('wahyu987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Dita Putri Pertiwi',
                'username' => 'dita',
                'password' => bcrypt('dita987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Darmaji',
                'username' => 'darmaji',
                'password' => bcrypt('darmaji987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Amrizal Ariansyah',
                'username' => 'amrizal',
                'password' => bcrypt('amrizal987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Yoga Eka Perdana',
                'username' => 'yoga',
                'password' => bcrypt('yoga987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Yossy Prastyo Utomo',
                'username' => 'yossy',
                'password' => bcrypt('yossy987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'M. Ali Nurojikkin',
                'username' => 'm_ali',
                'password' => bcrypt('m_ali987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'A Yohanuddin',
                'username' => 'yohan',
                'password' => bcrypt('yohan987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Ali Mahmudi',
                'username' => 'ali',
                'password' => bcrypt('ali987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Ahmad Dhuha Fauzi',
                'username' => 'dhuha',
                'password' => bcrypt('dhuha987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Imam Sugianto',
                'username' => 'imam',
                'password' => bcrypt('imam987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Irfano Radiant',
                'username' => 'irfano',
                'password' => bcrypt('irfano987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Fernando Martinus',
                'username' => 'fernando',
                'password' => bcrypt('fernando987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Yovi Dwi Kurniawan',
                'username' => 'yovi',
                'password' => bcrypt('yovi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Zainul Arifin',
                'username' => 'zainul',
                'password' => bcrypt('zainul987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'M Nur Hafith',
                'username' => 'hafith',
                'password' => bcrypt('hafith987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Liga Andrean',
                'username' => 'liga',
                'password' => bcrypt('liga987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Suwandi',
                'username' => 'suwandi',
                'password' => bcrypt('suwandi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Fiki Juni',
                'username' => 'fiki',
                'password' => bcrypt('fiki987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Sofi Febri Setiawan',
                'username' => 'sofi',
                'password' => bcrypt('sofi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Danang Candra S',
                'username' => 'danang',
                'password' => bcrypt('danang987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Alfin Musyafa',
                'username' => 'alfin',
                'password' => bcrypt('alfin987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Ivantio Yogatama',
                'username' => 'ivantio',
                'password' => bcrypt('ivantio987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Ari Shan Pradipta',
                'username' => 'ari_shan',
                'password' => bcrypt('ari_shan987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Khrisna Yusuf I',
                'username' => 'khrisna',
                'password' => bcrypt('khrisna987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Fery Ardianto',
                'username' => 'fery',
                'password' => bcrypt('fery987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Agus Setiawan',
                'username' => 'agus',
                'password' => bcrypt('agus987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Asit Maulana',
                'username' => 'asit',
                'password' => bcrypt('asit987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Bagus Pamungkas',
                'username' => 'bagus',
                'password' => bcrypt('bagus987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Ahmad Mahmudi',
                'username' => 'mahmudi',
                'password' => bcrypt('mahmudi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Junjung Ardian Herlambang',
                'username' => 'junjung',
                'password' => bcrypt('junjung987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Dani Oktavianto',
                'username' => 'dani',
                'password' => bcrypt('dani987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'M Robi',
                'username' => 'm_robi',
                'password' => bcrypt('m_robi987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Satrio Bagus Piningit',
                'username' => 'satrio',
                'password' => bcrypt('satrio987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'M Vandra',
                'username' => 'vandra',
                'password' => bcrypt('vandra987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Yudha Ade Pratama',
                'username' => 'yudha',
                'password' => bcrypt('yudha987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Johan Atim Saputra',
                'username' => 'johan',
                'password' => bcrypt('johan987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'One Fentino Reza',
                'username' => 'one',
                'password' => bcrypt('one987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'M Ismail',
                'username' => 'ismail',
                'password' => bcrypt('ismail987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Fachrul Syarifulloh',
                'username' => 'fachrul',
                'password' => bcrypt('fachrul987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Feri Andriyas',
                'username' => 'feri',
                'password' => bcrypt('feri987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'role_id' => 3,
                'name' => 'Mardiyanto',
                'username' => 'mardiyanto',
                'password' => bcrypt('mardiyanto987'),
                'hmi_access' => NULL,
                'admin' => 'Andik Kurniawan',
            ],
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
            [
                'name' => 'Saccharomat',
                'value' => 0.03,
                'admin' => 'Andik Kurniawan',
            ],
        ];
        Factor::insert($factors);

        $dirts = [
            [
                'name' => 'Pucuk',
                'interval' => 5,
                'punishment' => 5,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Sogolan',
                'interval' => 5,
                'punishment' => 5,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Daduk',
                'interval' => 5,
                'punishment' => 5,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Akar',
                'interval' => 5,
                'punishment' => 5,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Tali',
                'interval' => 5,
                'punishment' => 5,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Terbakar',
                'interval' => 5,
                'punishment' => 5,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Muda',
                'interval' => 5,
                'punishment' => 5,
                'admin' => 'Andik Kurniawan',
            ],
            [
                'name' => 'Lelesan',
                'interval' => 5,
                'punishment' => 5,
                'admin' => 'Andik Kurniawan',
            ],
        ];
        Dirt::insert($dirts);

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
            ['name' => 'Evaporator 1', 'station_id' => 4, 'method_id' => 16, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 2', 'station_id' => 4, 'method_id' => 16, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 3', 'station_id' => 4, 'method_id' => 16, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 4', 'station_id' => 4, 'method_id' => 16, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Evaporator 5', 'station_id' => 4, 'method_id' => 16, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Remelter In', 'station_id' => 5, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Reaction Tank', 'station_id' => 5, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Carbonated', 'station_id' => 5, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Clear Liquor', 'station_id' => 5, 'method_id' => 4, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Cake Head', 'station_id' => 5, 'method_id' => 7, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Cake Mid', 'station_id' => 5, 'method_id' => 7, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Cake End', 'station_id' => 5, 'method_id' => 7, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan A', 'station_id' => 6, 'method_id' => 15, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan A Raw', 'station_id' => 6, 'method_id' => 15, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan C', 'station_id' => 6, 'method_id' => 15, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan D', 'station_id' => 6, 'method_id' => 15, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan R1', 'station_id' => 6, 'method_id' => 15, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan R2', 'station_id' => 6, 'method_id' => 15, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Masakan R3', 'station_id' => 6, 'method_id' => 15, 'admin' => 'Andik Kurniawan', ],
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
            ['name' => 'Daert JJ', 'station_id' => 10, 'method_id' => 17, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Daert Yoshimine1', 'station_id' => 10, 'method_id' => 17, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'Daert Yoshimine2', 'station_id' => 10, 'method_id' => 17, 'admin' => 'Andik Kurniawan', ],
            ['name' => 'HW', 'station_id' => 10, 'method_id' => 17, 'admin' => 'Andik Kurniawan', ],
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

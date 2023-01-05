<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cvsFile = fopen(base_path('database/data/provinces.csv'), 'r');

        while (($data = fgetcsv($cvsFile, null, ';')) != false) {
            Province::create([
                'name' => $data[1]
            ]);
        }

        fclose($cvsFile);
    }
}

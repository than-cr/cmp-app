<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cvsFile = fopen(base_path('database/data/districts.csv'), 'r');

        while (($data = fgetcsv($cvsFile, null, ';')) != false) {
            District::create([
                'name' => $data[0],
                'canton_id' => $data[1]
            ]);
        }

        fclose($cvsFile);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Canton;
use Illuminate\Database\Seeder;

class CantonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cvsFile = fopen(base_path('database/data/cantons.csv'), 'r');

        while (($data = fgetcsv($cvsFile, null, ';')) != false) {
            Canton::create([
                'name' => $data[1],
                'province_id' => $data[2]
            ]);
        }

        fclose($cvsFile);
    }
}

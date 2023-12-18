<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Storing_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('storing_tests')->insert([
            [
                'experiment_id' => '1',
                'storing_fruit_id' => '1',
                'storing_temperature' => '4',
                'storing_humidity' => '4',
                'storing_day' => '4',
                'mass_loss_rate' => '0.8',
                'l' => '1.8',
                'a' => '37.8',
                'b' => '49.7',
                'e' => '19.3',
                'ph' => '6.9',
                'tss' => '5.4',
                'hardness' => '6.7',
                'moisture_content' => '20.0',
                'ta' => '20.9',
                'vitamin_c' => '39.0',
                'rr' => '38.9',
                'sem' => null,
                'clsm' => null,
                'afm' => null,
                'ftir' => null,
                'dsc' => null
            ],
            [
                'experiment_id' => '2',
                'storing_fruit_id' => '2',
                'storing_temperature' => '4',
                'storing_humidity' => '4',
                'storing_day' => '4',
                'mass_loss_rate' => '0.8',
                'l' => '1.8',
                'a' => '37.8',
                'b' => '49.7',
                'e' => '19.3',
                'ph' => '6.9',
                'tss' => '5.4',
                'hardness' => '6.7',
                'moisture_content' => '20.0',
                'ta' => '20.9',
                'vitamin_c' => '39.0',
                'rr' => '38.9',
                'sem' => null,
                'clsm' => null,
                'afm' => null,
                'ftir' => null,
                'dsc' => null
            ],
            [
                'experiment_id' => '3',
                'storing_fruit_id' => '3',
                'storing_temperature' => '4',
                'storing_humidity' => '4',
                'storing_day' => '4',
                'mass_loss_rate' => '0.8',
                'l' => '1.8',
                'a' => '37.8',
                'b' => '49.7',
                'e' => '19.3',
                'ph' => '6.9',
                'tss' => '5.4',
                'hardness' => '6.7',
                'moisture_content' => '20.0',
                'ta' => '20.9',
                'vitamin_c' => '39.0',
                'rr' => '38.9',
                'sem' => null,
                'clsm' => null,
                'afm' => null,
                'ftir' => null,
                'dsc' => null
            ],
                    
        


        ]);
    }
}

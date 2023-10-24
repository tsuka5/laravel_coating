<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Charactaristic_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('charactaristic_tests')->insert([
        [
            'experiment_id' => '1',
            'ph' => '5.6',
            'shear_rate' => '2.4',
            'viscosity' => '1.8',
            'moisture_content' => '33.3',
            'water_solubility' => '23.5',
            'wvp' => '12.3',
            'thickness' => '20.9',
            'contact_angle' => '5.9',
            'tensile_strength' => '43.2',
        ],
        [
            'experiment_id' => '2',
            'ph' => '5.6',
            'shear_rate' => '2.4',
            'viscosity' => '1.8',
            'moisture_content' => '33.3',
            'water_solubility' => '23.5',
            'wvp' => '12.3',
            'thickness' => '20.9',
            'contact_angle' => '5.9',
            'tensile_strength' => '43.2',
        ],
        [
            'experiment_id' => '3',
            'ph' => '5.6',
            'shear_rate' => '2.4',
            'viscosity' => '1.8',
            'moisture_content' => '33.3',
            'water_solubility' => '23.5',
            'wvp' => '12.3',
            'thickness' => '20.9',
            'contact_angle' => '5.9',
            'tensile_strength' => '43.2',
        ],


        ]);
    }
}

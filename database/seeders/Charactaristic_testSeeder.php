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
                'temperature' => '10.4',
                'shear_rate' => '2.4',
                'shear_stress' => '3.5',
                'rotation_speed' => '1000',
                'viscosity' => '1.8',
                'mc' => '33.3',
                'ws' => '23.5',
                'wvp' => '12.3',
                'thickness' => '20.9',
                'ca' => '5.9',
                'ts' => '43.2',
                'd43' => '3.4',
                'd32' => '5.8',
                'eab' => '5.6',
                'light_transmittance' => '40.5',
                'xrd' => '5.8',
                'afm' => null,
                'sem' => null,
                'dsc' => null,
                'ftir' => null,
                'clsm' => null
            ],
            [
                'experiment_id' => '2',
                'ph' => '5.6',
                'temperature' => '10.4',
                'shear_rate' => '2.4',
                'shear_stress' => '3.5',
                'rotation_speed' => '1000',
                'viscosity' => '1.8',
                'mc' => '33.3',
                'ws' => '23.5',
                'wvp' => '12.3',
                'thickness' => '20.9',
                'ca' => '5.9',
                'ts' => '43.2',
                'd43' => '3.4',
                'd32' => '5.8',
                'eab' => '5.6',
                'light_transmittance' => '40.5',
                'xrd' => '5.8',
                'afm' => null,
                'sem' => null,
                'dsc' => null,
                'ftir' => null,
                'clsm' => null
            ],
            [
                'experiment_id' => '3',
                'ph' => '5.6',
                'temperature' => '10.4',
                'shear_rate' => '2.4',
                'shear_stress' => '3.5',
                'rotation_speed' => '1000',
                'viscosity' => '1.8',
                'mc' => '33.3',
                'ws' => '23.5',
                'wvp' => '12.3',
                'thickness' => '20.9',
                'ca' => '5.9',
                'ts' => '43.2',
                'd43' => '3.4',
                'd32' => '5.8',
                'eab' => '5.6',
                'light_transmittance' => '40.5',
                'xrd' => '5.8',
                'afm' => null,
                'sem' => null,
                'dsc' => null,
                'ftir' => null,
                'clsm' => null
            ],


        ]);
    }
}

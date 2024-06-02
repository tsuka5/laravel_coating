<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Viscosity_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('viscosity_tests')->insert([
            [
                'composition_id' => '1',
                'temperature' => '5.6',
                'rotation_speed' => '33.3',
                'shear_rate' => '23.5',
                'shear_stress' => '20.9',
                'viscosity' => '5.9',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'temperature' => '122.6',
                'rotation_speed' => '33.3',
                'shear_rate' => '60.5',
                'shear_stress' => '90.9',
                'viscosity' => '88.9',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'temperature' => '5.6',
                'rotation_speed' => '33.3',
                'shear_rate' => '23.5',
                'shear_stress' => '20.9',
                'viscosity' => '5.9',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'temperature' => '5.6',
                'rotation_speed' => '33.3',
                'shear_rate' => '23.5',
                'shear_stress' => '20.9',
                'viscosity' => '5.9',
                'memo' => 'memoです'
            ],

        ]);
    }
}

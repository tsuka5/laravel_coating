<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
        [
            'experiment_id' => '1',
            'material_id' => '1',
            'm_name' => 'starch',
            'price' => '100.0',
            'concentration' => '0.3',
            'heat' => '1',
            'water_temperature' => '78.0',
            'water_rate' => '0.8',
            'material_rate' => '0.2',
            'staler_speed' => '800.0',
            'repeat' => '3',
            'staler_time' => '300',
            'ph_adjustment' => '1',
            'ph_material' => '5.6',
            'ph_target' => '8.0'


        ],
        [
            'experiment_id' => '1',
            'material_id' => '2',
            'm_name' => 'chitosan',
            'price' => '100.0',
            'concentration' => '0.3',
            'heat' => '1',
            'water_temperature' => '78.0',
            'water_rate' => '0.8',
            'material_rate' => '0.2',
            'staler_speed' => '800.0',
            'repeat' => '3',
            'staler_time' => '300',
            'ph_adjustment' => '1',
            'ph_material' => '5.6',
            'ph_target' => '8.0'


        ],
        [
            'experiment_id' => '2',
            'material_id' => '2',
            'm_name' => 'chitosan',
            'price' => '100.0',
            'concentration' => '0.3',
            'heat' => '1',
            'water_temperature' => '78.0',
            'water_rate' => '0.8',
            'material_rate' => '0.2',
            'staler_speed' => '800.0',
            'repeat' => '3',
            'staler_time' => '300',
            'ph_adjustment' => '1',
            'ph_material' => '5.6',
            'ph_target' => '8.0'


        ],
        [
            'experiment_id' => '3',
            'material_id' => '2',
            'm_name' => 'chitosan',
            'price' => '100.0',
            'concentration' => '0.3',
            'heat' => '1',
            'water_temperature' => '78.0',
            'water_rate' => '0.8',
            'material_rate' => '0.2',
            'staler_speed' => '800.0',
            'repeat' => '3',
            'staler_time' => '300',
            'ph_adjustment' => '1',
            'ph_material' => '5.6',
            'ph_target' => '8.0'


        ],


        ]);
    }
}

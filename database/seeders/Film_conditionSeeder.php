<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Film_conditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('film_conditions')->insert([
        [
            'experiment_id' => '1',
            'degassing_temperature' => '2.0',
            'dish_type' => 'normal',
            'dish_area' => '0.8',
            'casting_ml' => '1.8',
            'incubator_type' => 'normal',
            'drying_temperature' => '49.7',
            'drying_humidity' => '19.3',
            'drying_time' => '28.9',
        ],
        [
            'experiment_id' => '2',
            'degassing_temperature' => '45.6',
            'dish_type' => 'normal',
            'dish_area' => '0.8',
            'casting_ml' => '11.3',
            'incubator_type' => 'normal',
            'drying_temperature' => null,
            'drying_humidity' => '19.3',
            'drying_time' => '28.9',
        ],
        [
            'experiment_id' => '3',
            'degassing_temperature' => '45.6',
            'dish_type' => 'normal',
            'dish_area' => '0.8',
            'casting_ml' => '1.8',
            'incubator_type' => 'normal',
            'drying_temperature' => '23.0',
            'drying_humidity' => '19.3',
            'drying_time' => '28.9',
        ],


        ]);
    }
}

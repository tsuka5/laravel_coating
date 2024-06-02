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
                'casting_amount' => '1.8',
                'petri_dish_area' => '0.8',
                'degas_temperature' => '2.0',
                'drying_temperature' => '49.7',
                'drying_humidity' => '19.3',
                'drying_time' => '28.9',
                'memo' => 'memoです'
            ],
            [
                'experiment_id' => '2',
                'casting_amount' => '1.8',
                'petri_dish_area' => '0.8',
                'degas_temperature' => '2.0',
                'drying_temperature' => '49.7',
                'drying_humidity' => '19.3',
                'drying_time' => '28.9',
                'memo' => 'memoです'
            ],
            [
                'experiment_id' => '3',
                'casting_amount' => '1.8',
                'petri_dish_area' => '0.8',
                'degas_temperature' => '2.0',
                'drying_temperature' => '49.7',
                'drying_humidity' => '19.3',
                'drying_time' => '28.9',
                'memo' => 'memoです'
            ],
              


        ]);
    }
}

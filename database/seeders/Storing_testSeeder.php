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
                'storing_temperature' => '24',
                'storing_humidity' => '54',
                'storing_day' => '4',
                'memo' => 'memoです'
            ],
            [
                'experiment_id' => '2',
                'storing_fruit_id' => '2',
                'storing_temperature' => '24',
                'storing_humidity' => '54',
                'storing_day' => '4',
                'memo' => 'memoです'
            ],
            [
                'experiment_id' => '3',
                'storing_fruit_id' => '1',
                'storing_temperature' => '24',
                'storing_humidity' => '54',
                'storing_day' => '4',
                'memo' => 'memoです'
            ],
         

        ]);
    }
}

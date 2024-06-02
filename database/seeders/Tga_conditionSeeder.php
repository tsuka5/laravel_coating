<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Tga_conditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tga_conditions')->insert([
            [
                'experiment_id' => '1',
                'gas_id' => '1',
                'flow_rate' => '55.6',
                'start_temperature' => '33.3',
                'end_temperature' => '80.3',
                'temperature_range' => '47',
                'heating_rate' => '32.1',
                'memo' => 'memoです'
            ],
            [
                'experiment_id' => '1',
                'gas_id' => '1',
                'flow_rate' => '55.6',
                'start_temperature' => '33.3',
                'end_temperature' => '80.3',
                'temperature_range' => '47',
                'heating_rate' => '32.1',
                'memo' => 'memoです'
            ],
            [
                'experiment_id' => '1',
                'gas_id' => '1',
                'flow_rate' => '55.6',
                'start_temperature' => '33.3',
                'end_temperature' => '80.3',
                'temperature_range' => '47',
                'heating_rate' => '32.1',
                'memo' => 'memoです'
            ],

        ]);
    }
}

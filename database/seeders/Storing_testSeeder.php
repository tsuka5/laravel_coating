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
            's_name' => 'orange',
            'storing_days' => '4',
            'mass_loss_rate' => '0.8',
            'color_l' => '1.8',
            'color_a' => '37.8',
            'color_b' => '49.7',
            'color_e' => '19.3',
            'ph' => '6.9',
            'tss' => '5.4',
            'hardness' => '6.7',
            'moisture_content' => '20.0'

        ],
        [
            'experiment_id' => '2',
            's_name' => 'orange',
            'storing_days' => '4',
            'mass_loss_rate' => '0.8',
            'color_l' => '1.8',
            'color_a' => '37.8',
            'color_b' => '49.7',
            'color_e' => '19.3',
            'ph' => '6.9',
            'tss' => '5.4',
            'hardness' => '6.7',
            'moisture_content' => '20.0'

        ],
        [
            'experiment_id' => '3',
            's_name' => 'orange',
            'storing_days' => '4',
            'mass_loss_rate' => '0.8',
            'color_l' => '1.8',
            'color_a' => '37.8',
            'color_b' => '49.7',
            'color_e' => '19.3',
            'ph' => '6.9',
            'tss' => '5.4',
            'hardness' => '6.7',
            'moisture_content' => '20.0'

        ],
        


        ]);
    }
}

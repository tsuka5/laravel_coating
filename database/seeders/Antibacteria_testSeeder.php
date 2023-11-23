<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Antibacteria_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('antibacteria_tests')->insert([
        [
            'experiment_id' => '1',
            'a_name' => 'Rhizopus',
            'bacteria_rate' => '3.0',
            'mic' => '9.7'
        ],
        [
            'experiment_id' => '2',
            'a_name' => 'Rhizopus',
            'bacteria_rate' => '3.0',
            'mic' => '9.7'
        ],
        [
            'experiment_id' => '3',
            'a_name' => 'Rhizopus',
            'bacteria_rate' => '3.0',
            'mic' => '9.7'
        ],


        ]);
    }
}

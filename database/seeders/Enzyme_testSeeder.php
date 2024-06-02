<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Enzyme_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enzyme_tests')->insert([
            [
                'experiment_id' => '1',
                'enzyme_id' => '1',
                'enzyme_concentration' => '1',
                'substrate_id' => '1',
                'substrate_concentration' => '1',
                'ph' => '1',
                'temperature' => '1',
                'volume' => '1',
                'memo' => 'memoです'
            ],
            [
                'experiment_id' => '2',
                'enzyme_id' => '2',
                'enzyme_concentration' => '1',
                'substrate_id' => '1',
                'substrate_concentration' => '1',
                'ph' => '1',
                'temperature' => '1',
                'volume' => '1',
                'memo' => 'memoです'
            ],
            [
                'experiment_id' => '3',
                'enzyme_id' => '2',
                'enzyme_concentration' => '1',
                'substrate_id' => '1',
                'substrate_concentration' => '1',
                'ph' => '1',
                'temperature' => '1',
                'volume' => '1',
                'memo' => 'memoです'
            ],
           

        ]);
    }
}

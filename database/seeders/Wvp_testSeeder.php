<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Wvp_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('wvp_tests')->insert([
            [
                'composition_id' => '1',
                'temperature' => '25.6',
                'humidity' => '55.6',
                'wvp' => '33.3',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'temperature' => '25.6',
                'humidity' => '75.6',
                'wvp' => '43.3',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'temperature' => '25.6',
                'humidity' => '85.6',
                'wvp' => '63.3',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'temperature' => '5.6',
                'humidity' => '52.6',
                'wvp' => '33.3',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'temperature' => '5.6',
                'humidity' => '75.6',
                'wvp' => '53.3',
                'memo' => 'memoです'
            ],
            

        ]);
    }
}

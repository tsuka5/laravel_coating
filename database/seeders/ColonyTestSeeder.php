<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ColonyTestSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('colony_tests')->insert([
            [
                'composition_id' => '1',
                'day' => '1',
                'colony_diameter' => '0.5',
            ],
            [
                'composition_id' => '1',
                'day' => '2',
                'colony_diameter' => '1',
            ],
            [
                'composition_id' => '1',
                'day' => '3',
                'colony_diameter' => '2',
            ],
            [
                'composition_id' => '2',
                'day' => '1',
                'colony_diameter' => '2',
            ],
            [
                'composition_id' => '2',
                'day' => '3',
                'colony_diameter' => '5',
            ],
            [
                'composition_id' => '2',
                'day' => '5',
                'colony_diameter' => '6',
            ],
            [
                'composition_id' => '3',
                'day' => '1',
                'colony_diameter' => '2',
            ],
            


        ]);
    }
}

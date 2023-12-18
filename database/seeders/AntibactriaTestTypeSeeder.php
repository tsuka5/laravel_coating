<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AntibactriaTestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('antibacteria_test_types')->insert([
            [
                'name' => 'agar gas diffusion method',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'agar gas method',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'agar gas diffusion inhibition method',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'paper disk method',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'MIC method',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'suspection method',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'halo method',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'agar plate method',
                'charactaristic' => 'write some charactariscitc',
            ],

           
                   


        ]);
    }
}

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
                'name' => 'antibacteria_test_type1',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'antibacteria_test_type2',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'antibacteria_test_type3',
                'charactaristic' => 'write some charactariscitc',
            ],
           
                   


        ]);
    }
}

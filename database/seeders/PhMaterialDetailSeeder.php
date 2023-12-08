<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PhMaterialDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ph_material_details')->insert([
            [
                'name' => 'test1',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'test2',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'test3',
                'charactaristic' => 'write some charactariscitc',
            ],
           
                   


        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Bacteria_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bacteria_details')->insert([
        [
            'name' => 'test',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'test',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'test',
            'charactaristic' => 'write some charactariscitc',
        ],


        ]);
    }
}

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
                'name' => 'P.digitatum',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'P.italium',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'P.expansum',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'B.cinerea',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'P.citrinum',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'Rhizopus',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'M.piriformis',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'P.glabrum',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'P.chrysogenum',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'E.penicillium',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'S.aureus',
                'charactaristic' => 'write some charactariscitc',
            ],
            
    

        ]);
    }
}

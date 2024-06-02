<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Solvent_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('solvent_details')->insert([
            [
                'name' => 'water',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'ethanol',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'methanol',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'acetic acid',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'glycerol',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'propylene glycol',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'ethyl acetate',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'lactic acid',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'citric acid',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'isopropyl alcohol',
                'charactaristic' => 'write some charactariscitc',
            ],

        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Gas_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gas_details')->insert([
            [
                'name' => 'air',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'nitrogen',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'oxygen',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'argon',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'helium',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'hydrogen',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'carbon dioxide',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'ammonia',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'carbon monoxide',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'methane',
                'charactaristic' => 'write some charactariscitc',
            ],
        ]);
    }
}

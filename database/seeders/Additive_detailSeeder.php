<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Additive_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('additive_details')->insert([
        [
            'name' => 'span80',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'span60',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'span40',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'test3',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'test4',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'test5',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'test6',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'test7',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'test8',
            'charactaristic' => 'write some charactariscitc',
        ],



        ]);
    }
}

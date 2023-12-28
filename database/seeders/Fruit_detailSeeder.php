<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Fruit_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('fruit_details')->insert([
        [
            'name' => 'strawberry(Fragaria×ananassa)',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'pear',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'persimmon',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'tomato',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'western pear',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'apple',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'carrot',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'orange',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'mandarin orange',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'peach',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'pepper',
            'charactaristic' => 'write some charactariscitc',
        ],

        [
            'name' => 'okra',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'sweet potato',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'grape',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'shine muscat',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'cherry',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'eggplant',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'cucumber',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'kiwi fruit',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'carrot',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'broccoli',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'apricot',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'cashew',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'guava',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'banana',
            'charactaristic' => 'write some charactariscitc',
        ],
        [
            'name' => 'mango',
            'charactaristic' => 'write some charactariscitc',
        ],



        ]);
    }
}

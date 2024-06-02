<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Enzyme_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enzyme_details')->insert([
            [
                'name' => 'peroxidase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'polyphenol oxidase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'superoxide dismutase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'catalase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'lipase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'alkaline phosphatase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'glutathione-s-transferase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'ascorbate peroxidase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'lysozyme',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'trypsin',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'chymotrypsin',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'glucose oxidase',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'lipoxgenase',
                'charactaristic' => 'write some charactariscitc',
            ],
        ]);
    }
}

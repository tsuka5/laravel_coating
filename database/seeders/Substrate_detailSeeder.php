<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Substrate_detailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('substrate_details')->insert([
            [
                'name' => 'guaiacol',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'catechol',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'superoxide anion',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'hydrogen peroxide',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'triglycerides',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'p-nitrophenyl phosphate',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'glutathione',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'ascorbic acid',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'bacteria cell wall',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'benzoyl-dl-arginine-p-nitroanilide',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'n-glutaryl-l-phenylalanine-p-nitroanilide',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'glucose',
                'charactaristic' => 'write some charactariscitc',
            ],
            [
                'name' => 'linoleic acid',
                'charactaristic' => 'write some charactariscitc',
            ],
            
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Storing_multiple_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('storing_multiple_tests')->insert([
            [
                'composition_id' => '1',
                'day' => '1',
                'mass_loss_rate' => '0',
                'l' => '4',
                'a' => '54',
                'b' => '4',
                'e' => '64',
                'ph' => '4',
                'tss' => '4',
                'hardness' => '7',
                'moisture_content' => '14',
                'ta' => '38.9',
                'vitamin_c' => '10',
                'rr' => '10',
                'phenolic_content' => '11',
                'sem' => null,
                'clsm' => null,
                'afm' => null,
                'ftir' => null,
                'dsc' => null,
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'day' => '5',
                'mass_loss_rate' => '0',
                'l' => '6',
                'a' => '64',
                'b' => '8',
                'e' => '94',
                'ph' => '7',
                'tss' => '14',
                'hardness' => '17',
                'moisture_content' => '84',
                'ta' => '58.9',
                'vitamin_c' => '50',
                'rr' => '30',
                'phenolic_content' => '9',
                'sem' => null,
                'clsm' => null,
                'afm' => null,
                'ftir' => null,
                'dsc' => null,
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '2',
                'day' => '1',
                'mass_loss_rate' => '0',
                'l' => '4',
                'a' => '54',
                'b' => '4',
                'e' => '64',
                'ph' => '4',
                'tss' => '4',
                'hardness' => '7',
                'moisture_content' => '14',
                'ta' => '38.9',
                'vitamin_c' => '10',
                'rr' => '10',
                'phenolic_content' => '11',
                'sem' => null,
                'clsm' => null,
                'afm' => null,
                'ftir' => null,
                'dsc' => null,
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '3',
                'day' => '1',
                'mass_loss_rate' => '0',
                'l' => '4',
                'a' => '54',
                'b' => '4',
                'e' => '64',
                'ph' => '4',
                'tss' => '4',
                'hardness' => '7',
                'moisture_content' => '14',
                'ta' => '38.9',
                'vitamin_c' => '10',
                'rr' => '10',
                'phenolic_content' => '11',
                'sem' => null,
                'clsm' => null,
                'afm' => null,
                'ftir' => null,
                'dsc' => null,
                'memo' => 'memoです'
            ],
           

        ]);
    }
}

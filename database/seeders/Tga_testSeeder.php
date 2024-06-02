<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Tga_testSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tga_tests')->insert([
            [
                'composition_id' => '1',
                'odt' => '40',
                'mdt' => '60',
                'edt' => '90.3',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '2',
                'odt' => '40',
                'mdt' => '60',
                'edt' => '90.3',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '3',
                'odt' => '40',
                'mdt' => '60',
                'edt' => '90.3',
                'memo' => 'memoです'
            ],

        ]);
    }
}

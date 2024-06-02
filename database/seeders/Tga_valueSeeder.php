<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Tga_valueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tga_values')->insert([
            [
                'composition_id' => '1',
                'temperature' => '20',
                'mass_loss_rate' => '4.6',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'temperature' => '28',
                'mass_loss_rate' => '7.6',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '2',
                'temperature' => '20',
                'mass_loss_rate' => '4.6',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '3',
                'temperature' => '20',
                'mass_loss_rate' => '4.6',
                'memo' => 'memoです'
            ],
            
        ]);
    }
}

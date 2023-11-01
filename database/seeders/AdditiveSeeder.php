<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdditiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('additives')->insert([
        [
            'experiment_id' => '1',
            'ad_name' => 'span80',
            'price' => '100.0',
            'concentration' => '0.6',
        ],
        [
            'experiment_id' => '2',
            'ad_name' => 'span80',
            'price' => '100.0',
            'concentration' => '0.4',
        ],
        [
            'experiment_id' => '3',
            'ad_name' => 'span80',
            'price' => '100.0',
            'concentration' => '1.6',
        ],
        [
            'experiment_id' => '3',
            'ad_name' => 'span60',
            'price' => '80.0',
            'concentration' => '1.6',
        ],


        ]);
    }
}

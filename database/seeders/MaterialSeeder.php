<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('materials')->insert([
            [
                'composition_id' => '1',
                'material_id' => '1',
                'concentration' => '0.3',
                'ph_adjustment' => '1',
                'ph_material_id' => '1',
                'ph_purpose' => '8.0'
            ],
            [
                'composition_id' => '2',
                'material_id' => '1',
                'concentration' => '0.3',
                'ph_adjustment' => '0',
                'ph_material_id' => null,
                'ph_purpose' => null
            ],
            [
                'composition_id' => '2',
                'material_id' => '3',
                'concentration' => '0.3',
                'ph_adjustment' => '1',
                'ph_material_id' => '2',
                'ph_purpose' => '7.0'
            ],
            [
                'composition_id' => '3',
                'material_id' => '2',
                'concentration' => '0.3',
                'ph_adjustment' => '1',
                'ph_material_id' => '1',
                'ph_purpose' => '8.0'
            ],
                   


        ]);
    }
}

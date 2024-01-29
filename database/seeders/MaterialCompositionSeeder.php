<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialCompositionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('material_compositions')->insert([
        [
            'experiment_id' => '1'
        ],
        [
            'experiment_id' => '2'
        ],
        [
            'experiment_id' => '3'
        ],
        ]);
    }
}

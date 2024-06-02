<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Enzyme_valueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('enzyme_values')->insert([
            [
                'composition_id' => '1',
                'day' => '1',
                'enzyme_activity' => '1',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '1',
                'day' => '2',
                'enzyme_activity' => '3',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '2',
                'day' => '1',
                'enzyme_activity' => '1',
                'memo' => 'memoです'
            ],
            [
                'composition_id' => '3',
                'day' => '1',
                'enzyme_activity' => '1',
                'memo' => 'memoです'
            ],
           
           

        ]);
    }
}

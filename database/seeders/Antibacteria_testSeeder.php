<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Antibacteria_testSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('antibacteria_tests')->insert([
            [
                'experiment_id' => '1',
                'bacteria_id' => '1',
                'antibacteria_fruit_id' => '2',
                'test_id' => '1',
                'invivo_invitro' => '0',
                'mic' => '9.7',
            ],
            [
                'experiment_id' => '2',
                'bacteria_id' => '2',
                'antibacteria_fruit_id' => '1',
                'test_id' => '1',
                'invivo_invitro' => '0',
                'mic' => '9.7',
            ],
            [
                'experiment_id' => '3',
                'bacteria_id' => '3',
                'antibacteria_fruit_id' => '2',
                'test_id' => '1',
                'invivo_invitro' => '0',
                'mic' => '9.7',
            ],


        ]);
    }
}

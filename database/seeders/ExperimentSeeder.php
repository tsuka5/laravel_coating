<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class ExperimentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('experiments')->insert([
        [
            'user_id' => '7',
            'title' => 'test',
            'name' => 'oaki tsukasa',
            'date' => '2023/10/20',
            'paper_name' => 'paper_name1',
            'paper_url' => 'paper_url1'
        ],
        [
            'user_id' => '7',
            'title' => 'test1',
            'name' => 'ozaki tsukasa',
            'date' => '2023/10/20',
            'paper_name' => 'paper_name2',
            'paper_url' => 'paper_url2'

        ],
        [
            'user_id' => '7',
            'title' => 'test2',
            'name' => 'hashimoto takuya',
            'date' => '2023/10/20',
            'paper_name' => 'paper_name3',
            'paper_url' => 'paper_url3'

        ],


        ]);
    }
}

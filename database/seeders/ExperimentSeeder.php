<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExperimentSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('experiments')->insert([
        [
            'user_id' => '7',
            'title' => 'test',
            'name' => 'oaki tsukasa',
            'date' => '2023/10/20',
            'paper_name' => 'paper_name1',
            'paper_url' => 'paper_url1',
            'created_at' => '2023/12/21 11:11:11'
        ],
        [
            'user_id' => '7',
            'title' => 'test1',
            'name' => 'ozaki tsukasa',
            'date' => '2023/10/20',
            'paper_name' => 'paper_name2',
            'paper_url' => 'paper_url2',
            'created_at' => '2023/12/21 11:11:11'
        ],
        [
            'user_id' => '7',
            'title' => 'test2',
            'name' => 'hashimoto takuya',
            'date' => '2023/10/20',
            'paper_name' => 'paper_name3',
            'paper_url' => 'paper_url3',
            'created_at' => '2023/12/21 11:11:11'
        ],
        ]);
    }
}

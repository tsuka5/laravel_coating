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
            'user_id' => '1',
            'title' => 'test',
            'name' => '尾﨑司',
            'date' => '2023/10/20',
            'paper' => 'URLや論文の名前'
        ],
        [
            'user_id' => '1',
            'title' => 'test1',
            'name' => '尾﨑司',
            'date' => '2023/10/20',
            'paper' => 'URLや論文の名前'
        ],
        [
            'user_id' => '2',
            'title' => 'test2',
            'name' => '橋本拓矢',
            'date' => '2023/10/20',
            'paper' => 'URLや論文の名前'
        ],


        ]);
    }
}

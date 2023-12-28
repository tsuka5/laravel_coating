<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AffiliationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('affiliations')->insert([
            [
                'name' => 'kyushu-u university',
            ],
            [
                'name' => 'osaka university',
            ],
            [
                'name' => 'tokyo university',
            ],
           
                   


        ]);
    }
}

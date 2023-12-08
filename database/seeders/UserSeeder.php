<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'affiliation_id' => '1',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test1',
                'email' => 'test1@test.com',
                'affiliation_id' => '1',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test2',
                'email' => 'test2@test.com',
                'affiliation_id' => '1',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test3',
                'email' => 'test3@test.com',
                'affiliation_id' => '2',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test4',
                'email' => 'test4@test.com',
                'affiliation_id' => '2',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'test5',
                'email' => 'test5@test.com',
                'affiliation_id' => '3',
                'password' => Hash::make('password123'),
                'created_at' => '2021/01/01 11:11:11'
            ],
    
    
            ]);

    }
}

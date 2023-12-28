<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admins')->insert([
        [
            'name' => 'ozaki tsukasa',
            'email' => 'ozaki.tsukasa.941@s.kyushu-u.ac.jp',
            'password' => Hash::make('Se8YDbkE'),
        ],
        [
            'name' => 'takahashi manaka',
            'email' => 'takahashi.manaka.005@s.kyushu-u.ac.jp',
            'password' => Hash::make('Z9z4NGVi'),
        ],
        [
            'name' => 'tanaka fumihiko',
            'email' => 'fumit@bpes.kyushu-u.ac.jp',
            'password' => Hash::make('E8mWGuh5'),
        ],
        [
            'name' => 'tanaka fumina',
            'email' => 'fuminat@bpes.kyushu-u.ac.jp',
            'password' => Hash::make('i6C7sZKq'),
        ],


        ]);
    }
}

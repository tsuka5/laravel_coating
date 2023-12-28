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
                'name' => 'tanaka fumihiko',
                'email' => 'fumit@bpes.kyushu-u.ac.jp',
                'affiliation_id' => '1',
                'password' => Hash::make('E8mWGuh5'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'tanaka fumina',
                'email' => 'fuminat@bpes.kyushu-u.ac.jp',
                'affiliation_id' => '1',
                'password' => Hash::make('i6C7sZKq'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'koga arisa',
                'email' => 'koga.arisa.502@s.kyushu-u.ac.jp',
                'affiliation_id' => '1',
                'password' => Hash::make('kU3FAqNb'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'takahashi manaka',
                'email' => 'takahashi.manaka.005@s.kyushu-u.ac.jp',
                'affiliation_id' => '1',
                'password' => Hash::make('Z9z4NGVi'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'tomisaka hiroto',
                'email' => 'tomisaka.hiroto.371@s.kyushu-u.ac.jp',
                'affiliation_id' => '1',
                'password' => Hash::make('rH93EMqR'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'hisamatsu kaito',
                'email' => 'hisamatsu.kaito.964@s.kyushu-u.ac.jp',
                'affiliation_id' => '1',
                'password' => Hash::make('x5CuUzk3'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'ozaki tsukasa',
                'email' => 'ozaki.tsukasa.941@s.kyushu-u.ac.jp',
                'affiliation_id' => '1',
                'password' => Hash::make('Se8YDbkE'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'nogami taich',
                'email' => 'nogami.taichi.780@s.kyushu-u.ac.jp',
                'affiliation_id' => '1',
                'password' => Hash::make('cM9uPQ5j'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'nkede francis',
                'email' => 'nkedefrancis1@gmail.com',
                'affiliation_id' => '1',
                'password' => Hash::make('bS9rvchE'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'laras purti wigati',
                'email' => 'larasputriw@gmail.com',
                'affiliation_id' => '1',
                'password' => Hash::make('Ca5h3Hzy'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'meng fanze',
                'email' => 'Mengfanze721@hotmail.com',
                'affiliation_id' => '1',
                'password' => Hash::make('q5LnBCDd'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'mohammad hamayoon wardak',
                'email' => 'hamayoon.n@gmail.com',
                'affiliation_id' => '1',
                'password' => Hash::make('v4EHxyKj'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'van tran',
                'email' => 'tran.thi.van.1710@gmail.com',
                'affiliation_id' => '1',
                'password' => Hash::make('vN2SAmVQ'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
            [
                'name' => 'yan xirui',
                'email' => 'yxr0213100@outlook.com',
                'affiliation_id' => '1',
                'password' => Hash::make('pF5Ezt4s'),
                'created_at' => '2023/12/21 11:11:11'
            ],    
   
            
               
            ]);

    }
}

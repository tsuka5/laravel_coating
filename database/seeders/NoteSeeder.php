<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('notes')->insert([
            [
                'experiment_id' => '1',
                'note' => 'oaki tsukasa',
                'img1' => null,
                'img2' => null,
                'img3' => null,
                'img4' => null
            ],
            [
                'experiment_id' => '2',
                'note' => 'oaki tsukasa',
                'img1' => null,
                'img2' => null,
                'img3' => null,
                'img4' => null
            ],
            [
                'experiment_id' => '3',
                'note' => 'oaki tsukasa',
                'img1' => null,
                'img2' => null,
                'img3' => null,
                'img4' => null
            ],      

        ]);
    }
}

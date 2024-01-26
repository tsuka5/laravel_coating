<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\Experiment;
use App\Models\Material;
use App\Models\Film_condition;
use App\Models\Charactaristic_test;
use App\Models\Storing_test;
use App\Models\Antibacteria_test;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AffiliationSeeder::class,
            UserSeeder::class,
            Material_detailSeeder::class,
            Fruit_detailSeeder::class,
            Bacteria_detailSeeder::class,
            PhMaterialDetailSeeder::class,
            AntibactriaTestTypeSeeder::class,
            ExperimentSeeder::class,
            MaterialSeeder::class,
            // Film_conditionSeeder::class,
            // Charactaristic_testSeeder::class,
            Antibacteria_testSeeder::class,
            Storing_testSeeder::class,
            AdminSeeder::class,
            NoteSeeder::class,
        ]);

        

        Experiment::factory()->count(13)->create();

        $experiment_count = Experiment::count();

        Material::factory()->count(30)->create();
        Film_condition::factory()->count($experiment_count)->create();
        Charactaristic_test::factory()->count($experiment_count)->create();
        Storing_test::factory()->count(15)->create();
        Antibacteria_test::factory()->count(15)->create();
    }
}

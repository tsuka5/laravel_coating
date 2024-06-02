<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\Experiment;
use App\Models\Material;
use App\Models\Material_composition;
use App\Models\Film_condition;
use App\Models\Charactaristic_test;
use App\Models\Viscosity_test;
use App\Models\Wvp_test;
use App\Models\Tga_test;
use App\Models\Tga_value;
use App\Models\Storing_test;
use App\Models\Storing_multiple_test;
use App\Models\Enzyme_test;
use App\Models\Enzyme_value;
use App\Models\Antibacteria_test;
use App\Models\Colony_test;

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
            Solvent_detailSeeder::class,
            Gas_detailSeeder::class,
            Enzyme_detailSeeder::class,
            Fruit_detailSeeder::class,
            Bacteria_detailSeeder::class,
            Substrate_detailSeeder::class,
            PhMaterialDetailSeeder::class,
            AntibactriaTestTypeSeeder::class,
            ExperimentSeeder::class,
            MaterialCompositionSeeder::class,
            MaterialSeeder::class,
            Film_conditionSeeder::class,
            Charactaristic_testSeeder::class,
            Viscosity_testSeeder::class,
            Wvp_testSeeder::class,
            Tga_testSeeder::class,
            Tga_valueSeeder::class,
            Antibacteria_testSeeder::class,
            ColonyTestSeeder::class,
            Storing_testSeeder::class,
            Storing_multiple_testSeeder::class,
            Enzyme_testSeeder::class,
            Enzyme_valueSeeder::class,
            AdminSeeder::class,
            NoteSeeder::class,
        ]);

        

        // Experiment::factory()->count(15)->create();

        // Material_composition::factory()->count(30)->create();
        // $composition_count = Material_composition::count();
        
        // Material::factory()->count(30)->create();
        // Film_condition::factory()->count($composition_count)->create();

        // Charactaristic_test::factory()->count($composition_count)->create();
        // $characteristic_test_count = Charactaristic_test::count();
        // Viscosity_test::factory()->count($characteristic_test_count)->create();
        // Wvp_test::factory()->count($characteristic_test_count)->create();
        // Tga_test::factory()->count($characteristic_test_count)->create();
        
        // $tga_test_count = Tga_test::count();
        // Tga_value::factory()->count($tga_test_count)->create();
        
        // Storing_test::factory()->count(15)->create();
        // $storing_test_count = Storing_test::count();
        // Storing_multiple_test::factory()->count($storing_test_count)->create();
        // Enzyme_test::factory()->count($storing_test_count)->create();

        // $enzyme_test_count = Enzyme_test::count();
        // Enzyme_value::factory()->count($enzyme_test_count)->create();

        // Antibacteria_test::factory()->count(15)->create();
        // $antibacteria_test_count = Antibacteria_test::count();
        // colony_test::factory()->count($antibacteria_test_count)->create();
    }
}

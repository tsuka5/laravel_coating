<?php

namespace Database\Factories;

use App\Models\Antibacteria_test;
use App\Models\Material_composition;
use App\Models\Fruit_detail;
use App\Models\Bacteria_detail;
use App\Models\Antibacteria_test_type;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Antibacteria_test>
 */
class Antibacteria_testFactory extends Factory
{
    protected $model = Antibacteria_test::class;

    public function definition(): array
    {
        $compositions_id = Material_composition::pluck('id')->toArray();
        $fruits_id = Fruit_detail::pluck('id')->toArray();    
        $bacteria_id = Bacteria_detail::pluck('id')->toArray();
        $tests_id = Antibacteria_test_type::pluck('id')->toArray();
        
        $composition_id = $compositions_id[random_int(0, count($compositions_id) - 1)];
        $fruit_id = $fruits_id[random_int(0, count($fruits_id) - 1)];
        $bacterium_id = $bacteria_id[random_int(0, count($bacteria_id) - 1)];
        $test_id = $tests_id[random_int(0, count($tests_id) - 1)];
        
        return [
            'composition_id' => $composition_id,
            'bacteria_id' => $bacterium_id,
            'antibacteria_fruit_id' => $fruit_id,
            'test_id' => $test_id,
            'invivo_invitro' => $this->faker->boolean,
            'bacteria_concentration' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100000),
            'mic' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
        ];
    }
}

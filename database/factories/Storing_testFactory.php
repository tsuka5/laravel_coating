<?php

namespace Database\Factories;

use App\Models\Storing_test;
use App\Models\Material_composition;
use App\Models\Fruit_detail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Storing_test>
 */
class Storing_testFactory extends Factory
{
    protected $model = Storing_test::class;

    public function definition(): array
    {
        $compositions_id = Material_composition::pluck('id')->toArray();
        $fruits_id = Fruit_detail::pluck('id')->toArray();        
        
        $composition_id = $compositions_id[random_int(0, count($compositions_id) - 1)];
        $fruit_id = $fruits_id[random_int(0, count($fruits_id) - 1)];
        
        return [
            'composition_id' => $composition_id,
            'storing_fruit_id' => $fruit_id,
            'storing_temperature' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 40 ),
            'storing_humidity' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'storing_day' => $this->faker->optional()->randomFloat($nbMaxDecimals = null, $min = 0, $max = 50),
            'mass_loss_rate' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'l' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 1),
            'a' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 1),
            'b' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 1),
            'e' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 1),
            'ph' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 14),
            'tss' => $this->faker->optional()->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 10),
            'hardness' => $this->faker->optional()->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 1),
            'moisture_content' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'ta' => $this->faker->optional()->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
            'vitamin_c' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'rr' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 10),
            // 'sem' 
            // 'clsm' 
            // 'afm',
            // 'ftir',
            // 'dsc'

        ];
    }
}

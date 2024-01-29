<?php

namespace Database\Factories;

use App\Models\Material_composition;
use App\Models\Film_condition;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film_condition>
 */
class Film_conditionFactory extends Factory
{
    protected $model = Film_condition::class;

    public function definition(): array
    {
        $compositions_id = Material_composition::pluck('id')->toArray();
                
        return [
            'composition_id' => $this->faker->unique()->numberBetween(1, count($compositions_id)),
            'casting_amount' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'petri_dish_area' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'degas_temperature' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 60),
            'drying_temperature' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'drying_humidity' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'drying_time' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
        ];
    }
}

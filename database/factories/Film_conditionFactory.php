<?php

namespace Database\Factories;

use App\Models\Experiment;
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
        $experiments_id = Experiment::pluck('id')->toArray();
                
        return [
            'experiment_id' => $this->faker->unique()->numberBetween(1, count($experiments_id)),
            'casting_amount' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'petri_dish_area' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'degas_temperature' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 60),
            'drying_temperature' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'drying_humidity' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'drying_time' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
        ];
    }
}

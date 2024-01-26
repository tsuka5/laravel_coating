<?php

namespace Database\Factories;

use App\Models\Experiment;
use App\Models\Charactaristic_test;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Charactaristic_test>
 */
class Charactaristic_testFactory extends Factory
{
    protected $model = Charactaristic_test::class;

    public function definition(): array
    {
        $experiments_id = Experiment::pluck('id')->toArray();
        
        return [
            'experiment_id' => $this->faker->unique()->randomElement($experiments_id),
            'ph' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1),
            'temperature' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 40),
            'shear_rate' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 100),
            'shear_stress' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 10000),
            'rotation_speed' => $this->faker->optional()->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 3000),
            'viscosity' => $this->faker->optional(0.9)->randomFloat($nbMaxDecimals = 1, $min = 0, $max = 1000),
            'mc' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'ws' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'wvp' => $this->faker->optional()->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
            'thickness' => $this->faker->optional()->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
            'ca' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 90),
            'ts' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'd43' => $this->faker->optional()->randomFloat($nbMaxDecimals = 4, $min = 0, $max = 1),
            'd32' => $this->faker->optional()->randomFloat($nbMaxDecimals = 4, $min = 0, $max = 1),
            'eab' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'light_transmittance' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            'xrd' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 100),
            // 'afm' => $this->faker->
            // 'sem' => $this->faker->
            // 'dsc' => $this->faker->
            // 'ftir' => $this->faker->
            // 'clsm' => $this->faker->
            ];
    }
}

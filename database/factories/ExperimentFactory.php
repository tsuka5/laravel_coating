<?php

namespace Database\Factories;

use App\Models\Experiment;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experiment>
 */
class ExperimentFactory extends Factory
{
    protected $model = Experiment::class;

    public function definition(): array
    {
        $users_id = User::pluck('id')->toArray();

        $user_id = $users_id[random_int(0, count($users_id) - 1)];
        
        return [
            'user_id' => $user_id,
            'title' => $this->faker->sentence,
            'name' => $this->faker->name,
            'date' => $this->faker->dateTimeBetween(),
            'paper_name' => $this->faker->sentence,
            'paper_url' => $this->faker->optional()->url(),
        ];
    }
}

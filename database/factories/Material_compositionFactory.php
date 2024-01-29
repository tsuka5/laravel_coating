<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Experiment;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material_composition>
 */
class Material_compositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // すべての実験のIDを配列に格納します
        $experiments_id = Experiment::pluck('id')->toArray();
    
        // 配列をシャッフルします
        shuffle($experiments_id);
    
        // 実験のIDを順番に取得して返す定義を作成します
        return [
            'experiment_id' => function () use (&$experiments_id) {
                // 配列から実験のIDを取得します
                $id = array_shift($experiments_id);
    
                // 配列が空になった場合は、すべての実験のIDを再度取得し直します
                if (empty($experiments_id)) {
                    $experiments_id = Experiment::pluck('id')->toArray();
                    shuffle($experiments_id);
                }
    
                return $id;
            }
        ];
    }
// $id = $experiments_id[random_int(0, count($experiments_id) - 1)];
}
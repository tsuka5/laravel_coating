<?php

namespace Database\Factories;
use App\Models\Experiment;
use App\Models\Material;
use App\Models\Material_detail;
use App\Models\Ph_material_detail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Material>
 */
class MaterialFactory extends Factory
{
    protected $model = Material::class;

    public function definition(): array
    {
        $experiments_id = Experiment::pluck('id')->toArray();
        $materials_id = Material_detail::pluck('id')->toArray();        
        $ph_materials_id =Ph_material_detail::pluck('id')->toArray();        
        
        $experiment_id = $experiments_id[random_int(0, count($experiments_id) - 1)];
        $material_id = $materials_id[random_int(0, count($materials_id) - 1)];
        $ph_material_id = $ph_materials_id[random_int(0, count($ph_materials_id) - 1)];
        
        return [
            'experiment_id' => $experiment_id,
            'material_id' => $material_id,
            'concentration' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1),
            'ph_adjustment' => $this->faker->boolean,
            'ph_material_id' => $ph_material_id,
            'ph_purpose' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 14),
        ];
    }
}

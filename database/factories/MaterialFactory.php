<?php

namespace Database\Factories;
use App\Models\Material_composition;
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
        $compositions_id = Material_composition::pluck('id')->toArray();
        $materials_id = Material_detail::pluck('id')->toArray();        
        $ph_materials_id =Ph_material_detail::pluck('id')->toArray();        
        
        $composition_id = $compositions_id[random_int(0, count($compositions_id) - 1)];
        $material_id = $materials_id[random_int(0, count($materials_id) - 1)];
        $ph_material_id = $ph_materials_id[random_int(0, count($ph_materials_id) - 1)];
        
        return [
            'composition_id' => $composition_id,
            'material_id' => $material_id,
            'concentration' => $this->faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 1),
            'ph_adjustment' => $this->faker->boolean,
            'ph_material_id' => $ph_material_id,
            'ph_purpose' => $this->faker->optional()->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 14),
        ];
    }
}

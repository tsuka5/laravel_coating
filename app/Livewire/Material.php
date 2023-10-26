<?php

namespace App\Livewire;

use Livewire\Component;

class Material extends Component
{
    public $materials = [];

    protected $rules = [
        'materials.*.name' => 'required',
        'materials.*.price' => 'nullable',
        'materials.*.concentration' => 'nullable',
        'materials.*.heat' => 'nullable',
        'materials.*.water_temperature' => 'nullable',
        'materials.*.material_rate' => 'nullable',
        'materials.*.staler_speed' => 'nullable',
        'materials.*.ph_adjustment' => 'nullable',
        'materials.*.ph_material' => 'nullable',
        'materials.*.ph_target' => 'nullable',
    ];

    protected $validationAttributes = [
        'materials.*.name' => 'name',
        'materials.*.price' => 'price',
        'materials.*.concentration' => 'concentration',
        'materials.*.heat' => 'heat',
        'materials.*.water_temperature' => 'water_temperature',
        'materials.*.material_rate' => 'material_rate',
        'materials.*.staler_speed' => 'starler_speed',
        'materials.*.ph_adjustment' => 'ph_adjustment',
        'materials.*.ph_material' => 'ph_material',
        'materials.*.ph_target' => 'ph_target',
    ];

    public function mount()
    {
        $this->materials = [
            ['experiment_id' => null,
            'name' => null,
            'price' => null,
            'concentration' => null,
            'heat' => null,
            'water_temperature' => null,
            'water_rate' => null,
            'material_rate' => null,
            'staler_speed' => null,
            'repeat' => null,
            'staler_time' => null,
            'ph_adjustment' => null,
            'ph_material' => null,
            'ph_target' => null],
            
        ];
    }

    public function render()
    {
        return view('livewire.material');
            
    }

    public function add()
    {
        $this->materials[] = [
        'name' => null,
        'price' => null,
        'concentration' =>null,
        'heat' => null,
        'water_temperature' => null,
        'material_rate' => null,
        'staler_speed' => null,
        'ph_adjustment' => null,
        'ph_material' => null,
        'ph_target' => null];
    }

    public function delete($key)
    {
        unset($this->materials[$key]);
    }

    public function create()
    {
        $this->validate();
        dd('ok');
    }
}
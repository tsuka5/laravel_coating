<?php

namespace App\Livewire;

use Livewire\Component;

class Additive extends Component
{
    public $additives = [];

    protected $rules = [
        'additives.*.name' => 'required',
        'additives.*.price' => 'nullable',
        'additives.*.concentration' => 'nullable',
        
    ];

    protected $validationAttributes = [
        'additives.*.name' => 'name',
        'additives.*.price' => 'price',
        'additives.*.concentration' => 'concentration',
    ];

    public function mount()
    {
        $this->additives = [
            ['experiment_id' => null,
            'name' => null,
            'price' => null,
            'concentration' => null,
            ],   
        ];
    }

    public function render()
    {
        return view('livewire.additive');
            
    }

    public function add()
    {
        $this->additives[] = [
        'name' => null,
        'price' => null,
        'concentration' =>null,
        ];
    }

    public function delete($key)
    {
        unset($this->additives[$key]);
    }

    public function create()
    {
        $this->validate();
        dd('ok');
    }
}
<?php

namespace App\Livewire;

use Livewire\Component;

class Additive extends Component
{
    public $additives = [];

    protected $rules = [
        'additives.*.ad_name' => 'nullable',
        'additives.*.price' => 'nullable',
        'additives.*.concentration' => 'nullable',
        
    ];

    protected $validationAttributes = [
        'additives.*.ad_name' => 'ad_name',
        'additives.*.price' => 'price',
        'additives.*.concentration' => 'concentration',
    ];

    public function mount()
    {
        $this->additives = [
            ['experiment_id' => null,
            'ad_name' => null,
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
        'ad_name' => null,
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
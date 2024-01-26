<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Experiment;



class Charactaristic_test extends Model
{
    use HasFactory;

    public $timestamps = false; //update_atなどを無効にする

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'experiment_id',
        'ph',
        'temperature',
        'shear_rate',
        'shear_stress',
        'rotation_speed',
        'viscosity',
        'mc',
        'ws',
        'wvp',
        'thickness',
        'ca',
        'ts',
        'd43',
        'd32',
        'eab',
        'light_transmittance',
        'xrd',
        'afm',
        'sem',
        'dsc',
        'ftir',
        'clsm'
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }

 
}
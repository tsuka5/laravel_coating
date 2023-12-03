<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Experiment;



class Charactaristic_test extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false; //update_atなどを無効にする

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'experiment_id',
        'ph',
        'shear_rate',
        'shear_stress',
        'viscosity',
        'moisture_content',
        'water_solubility',
        'wvp',
        'thickness',
        'contact_angle',
        'tensile_strength',
        'afm1',
        'afm2',
        'sem1',
        'sem2',
        'dsc1',
        'dsc2',
        'ftir1',
        'ftir2',
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }

 
}
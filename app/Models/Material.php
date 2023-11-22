<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Experiment;
// use App\Models\Material_detail;



class Material extends Model
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
        // 'material_id',
        'name',
        'price',
        'concentration',
        'heat',
        'water_temperature',
        'water_rate',
        'material_rate',
        'staler_speed',
        'repeat',
        'staler_time',
        'ph_adjustment',
        'ph_material',
        'ph_target',
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
    // public function material_detail(): BelongsTo
    // {
    //     return $this->belongsTo(Material_detail::class);
    // }

 
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Experiment;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'material_id',
        'concentration',
        'ph_adjustment',
        'ph_material_id',
        'ph_purpose',
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
    public function material_detail(): HasOne
    {
        return $this->hasOne(Material_detail::class, 'id', 'material_id');
    }
    public function ph_material_detail(): HasOne
    {
        return $this->hasOne(Ph_material_detail::class, 'id', 'ph_material_id');
    }
            //外部キー，親の主キー

 
}
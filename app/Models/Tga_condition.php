<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Experiment;
use App\Models\Tga_value;



class Tga_condition extends Model
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
        'gas_id',
        'flow_rate',
        'start_temperature',
        'end_temperature',
        'temperature_range',
        'heating_rate',
        'memo',
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class, 'experiment_id', 'id');
    }
    public function tga_value(): Hasmany
    {
        return $this->hasMany(Tga_value::class, 'tga_test_id', 'id');
    }
    public function gas_detail(): BelongsTo
    {
        return $this->belongsTo(Gas_detail::class, 'gas_id', 'id') ;
    }
 
}
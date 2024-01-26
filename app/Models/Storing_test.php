<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Experiment;
use App\Models\Fruit_detail;


use function PHPSTORM_META\map;

class Storing_test extends Model
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
        'storing_fruit_id',
        'storing_temperature',
        'storing_humidity',
        'storing_day',
        'mass_loss_rate',
        'l',
        'a',
        'b',
        'e',
        'ph',
        'tss',
        'hardness',
        'moisture_content',
        'ta',
        'vitamin_c',
        'rr',
        'sem',
        'clsm',
        'afm',
        'ftir',
        'dsc'

    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
    public function fruit_detail(): HasOne
    {
        return $this->hasOne(fruit_detail::class, 'id', 'storing_fruit_id');
    }

}

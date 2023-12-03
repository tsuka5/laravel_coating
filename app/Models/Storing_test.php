<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Experiment;
use App\Models\Fruit_detail;



class Storing_test extends Model
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
        's_name',
        'fruit_id',
        'storing_days',
        'mass_loss_rate',
        'color_l',
        'color_a',
        'color_b',
        'color_e',
        'ph',
        'tss',
        'hardness',
        'moisture_content'
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
    public function storing_test(): BelongsTo
    {
        return $this->belongsTo(Storing_test::class);
    }
    public function fruit_detail(): HasOne
    {
        return $this->hasOne(Fruit_detail::class);
    }

 
}
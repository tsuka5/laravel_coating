<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Experiment;



class Antibacteria_test extends Model
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
        'bacteria_id',
        'antibacteria_fruit_id',
        'test_id',
        'invivo_invitro',
        'bacteria_concentration',
        'mic',
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
    public function bacteria_detail(): HasOne
    {
        return $this->hasOne(Bacteria_detail::class, 'id', 'bacteria_id');
    }
    public function fruit_detail(): HasOne
    {
        return $this->hasOne(Fruit_detail::class, 'id', 'antibacteria_fruit_id');
    }
    public function antibacteria_test_type(): HasOne
    {
        return $this->hasOne(Antibacteria_test_type::class, 'id', 'test_id');
    }


}
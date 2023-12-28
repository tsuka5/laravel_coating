<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Storing_test;

// use App\Models\Experiment;



class Fruit_detail extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false; //update_atなどを無効にする

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'name',
        'charactaristic'
    ];

    public function storing_test(): BelongsTo
    {
        return $this->belongsTo(storing_test::class, 'id', 'storing_fruit_id' );
    }
    public function antibacteria_test(): BelongsTo
    {
        return $this->belongsTo(Antibacteria_test::class, 'id', 'antibacteria_fruit_id' );
    }

    // public function experiment(): BelongsTo
    // {
    //     return $this->belongsTo(Experiment::class);
    // }

 
}
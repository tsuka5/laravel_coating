<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
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

    public function storing_test(): HasOne
    {
        return $this->hasOne(storing_test::class, 'storing_fruit_id', 'id' );
    }
    public function antibacteria_test(): HasOne
    {
        return $this->hasOne(Antibacteria_test::class, 'antibacteria_fruit_id', 'id' );
    }

 

 
}
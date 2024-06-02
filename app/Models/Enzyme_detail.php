<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Enzyme_test;

// use App\Models\Experiment;



class Enzyme_detail extends Model
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

    public function Enzyme_test(): HasOne
    {
        return $this->hasOne(Enzyme_test::class, 'enzyme_id', 'id');
    }
   

 
}
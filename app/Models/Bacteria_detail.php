<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


// use Illuminate\Database\Eloquent\Relations\BelongsTo;
// use App\Models\Experiment;



class Bacteria_detail extends Model
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

    // public function experiment(): BelongsTo
    // {
    //     return $this->belongsTo(Experiment::class);
    // }

    public function antibacteria_test(): BelongsTo
    {
        return $this->belongsTo(Antibacteria_test::class, 'id', 'bacteria_id' );
    }

 
}
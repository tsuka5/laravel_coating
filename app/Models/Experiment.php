<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;



class experiment extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false; //update_atなどを無効にする

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

       // ここで初期値を定義する
    // protected $attributes = [
    //     'paper' => 'null',
    // ];

    protected $fillable = [
        'user_id',
        'title',
        'name' ,
        'date' ,
        'paper',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

 
}
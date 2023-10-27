<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\Film_condition;
use App\Models\Charactaristic_test;
use App\Models\Storing_test;
use App\Models\Material;
use App\Models\Additive;



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

    public function film_comdition(): HasOne
    {
        return $this->hasOne(Film_condition::class);
    }

    public function charactaristic_test(): HasOne
    {
        return $this->hasOne(Charactaristic_test::class);
    }

    public function storing_test(): HasOne
    {
        return $this->hasOne(Storing_test::class);
    }

    public function antibacteria_test(): HasOne
    {
        return $this->hasOne(Antibacteria_test::class);
    }

    public function material(): HasMany
    {
        return $this->hasMany(Material::class);
    }

    public function additive(): HasMany
    {
        return $this->hasMany(Additive::class);
    }
 
}
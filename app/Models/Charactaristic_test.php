<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Hasmany;
use App\Models\Material_composition;
use App\Models\Viscosity_test;
use App\Models\Wvp_test;
use App\Models\Tga_test;



class Charactaristic_test extends Model
{
    use HasFactory;

    public $timestamps = false; //update_atなどを無効にする

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'composition_id',
        'ph',
        'mc',
        'ws',
        'thickness',
        'ca',
        'ts',
        'd43',
        'd32',
        'eab',
        'light_transmittance',
        'xrd',
        'afm',
        'sem',
        'dsc',
        'ftir',
        'clsm',
        'memo'
    ];

    public function material_composition(): BelongsTo
    {
        return $this->belongsTo(Material_composition::class, 'composition_id', 'id');
    }
    // public function viscosity_test(): HasMany
    // {
    //     return $this->hasMany(Viscosity_test::class, 'characteristic_id', 'id');
    // }
    // public function wvp_test(): HasMany
    // {
    //     return $this->hasMany(Wvp_test::class, 'charactaristic_test', 'id');
    // }
    // public function tga_test(): HasMany
    // {
    //     return $this->hasMany(Tga_test::class, 'charactaristic_test', 'id');
    // }
    
 
}
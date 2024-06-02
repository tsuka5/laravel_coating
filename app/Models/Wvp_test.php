<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Material_composition;



class Wvp_test extends Model
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
        'humidity',
        'wvp',
        'memo',
    ];

    public function material_composition(): BelongsTo
    {
        return $this->belongsTo(Material_composition::class, 'composition_id', 'id');
    }

 
}
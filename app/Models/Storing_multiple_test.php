<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Material_composition;



use function PHPSTORM_META\map;

class Storing_multiple_test extends Model
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
        'day',
        'mass_loss_rate',
        'l',
        'a',
        'b',
        'e',
        'ph',
        'tss',
        'hardness',
        'moisture_content',
        'ta',
        'vitamin_c',
        'rr',
        'phenolic_content',
        'memo'

    ];

    public function material_composition(): BelongsTo
    {
        return $this->belongsTo(Material_composition::class, 'composition_id', 'id');
    }

}

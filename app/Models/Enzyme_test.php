<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Material_composition;
use App\Models\Enzyme_detail;
use App\Models\Substrate_detail;



use function PHPSTORM_META\map;

class Enzyme_test extends Model
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
        'enzyme_id',
        'enzyme_concentration',
        'substrate_id',
        'substrate_concentration',
        'ph',
        'temperature',
        'volume',
        'time',
        'ta',
        'memo'

    ];

    public function Material_composition(): BelongsTo
    {
        return $this->belongsTo(Material_composition::class, 'composition_id', 'id');
    }
    public function enzyme_detail(): BelongsTo
    {
        return $this->belongsTo(Enzyme_detail::class, 'enzyme_id', 'id');
    }
    public function substrate_detail(): BelongsTo
    {
        return $this->belongsTo(substrate_detail::class, 'substrate_id', 'id');
    }

}

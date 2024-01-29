<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Material_composition;
use App\Models\Material_detail;
use App\Models\Ph_material_detail;


class Material extends Model
{
    use HasFactory;

    public $timestamps = false; 

    protected $fillable = [
        'composition_id',
        'material_id',
        'concentration',
        'ph_adjustment',
        'ph_material_id',
        'ph_purpose',
    ];

    public function material_composition(): BelongsTo
    {
        return $this->belongsTo(Material_composition::class, 'id', 'composition_id' );
    }
    public function material_detail(): HasOne
    {
        return $this->hasOne(Material_detail::class, 'id', 'material_id');
    }
    public function ph_material_detail(): HasOne
    {
        return $this->hasOne(Ph_material_detail::class, 'id', 'ph_material_id');
    }
}

//外部キー，親の主キー
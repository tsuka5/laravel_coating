<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Material_composition;
use App\Models\Material_detail;
use App\Models\Solvent_detail;
use App\Models\Ph_material_detail;


class Material extends Model
{
    use HasFactory;

    public $timestamps = false; 

    protected $fillable = [
        'composition_id',
        'material_id',
        'concentration',
        'solvent_id',
        'solvent_concentration',
        'ph_adjustment',
        'ph_material_id',
        'ph_purpose',
        'memo'
    ];

    public function material_composition(): BelongsTo
    {
        return $this->belongsTo(Material_composition::class, 'composition_id', 'id' );
    }
    public function material_detail(): BelongsTo
    {
        return $this->belongsTo(Material_detail::class, 'material_id', 'id');
    }
    public function solvent_detail(): BelongsTo
    {
        return $this->belongsTo(Solvent_detail::class, 'solvent_id', 'id');
    }
    public function ph_material_detail(): BelongsTo
    {
        return $this->belongsTo(Ph_material_detail::class, 'ph_material_id', 'id');
    }
}

//外部キー，親の主キー
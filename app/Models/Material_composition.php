<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Experiment;
use App\Models\Material;
use App\Models\Film_condition;
use App\Models\Charactaristic_test;
use App\Models\Storing_multiple_test;
use App\Models\Antibacteria_test;
use App\Models\Note;
use App\Models\Cfu_test;
use App\Models\Tga_value;
use App\Models\Survivalrate_test;
use App\Models\Growthcurve_test;
use App\Models\Mic_test;
use Database\Seeders\Storing_multiple_testSeeder;


class Material_composition extends Model
{
    use HasFactory;

    public $timestamps = false; 

    protected $fillable = [
        'experiment_id'
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class, 'experiment_id', 'id');
    }
    public function viscosity_test(): HasMany
    {
        return $this->hasMany(Viscosity_test::class, 'composition_id', 'id');
    }
    public function wvp_test(): HasMany
    {
        return $this->hasMany(Wvp_test::class, 'composition_id', 'id');
    }
    public function tga_value(): HasMany
    {
        return $this->hasMany(Tga_value::class, 'composition_id', 'id');
    }
    public function material(): Hasmany
    {
        return $this->hasMany(Material::class, 'composition_id', 'id');
    }
    public function note(): HasMany
    {
        return $this->hasMany(Note::class);
    }
    public function colony_test(): HasMany
    {
        return $this->hasMany(Colony_test::class, 'composition_id', 'id');
    }
    public function enzyme_value(): HasMany
    {
        return $this->hasMany(Enzyme_value::class, 'composition_id', 'id');
    }
    public function storing_multiple_test(): HasMany
    {
        return $this->hasMany(Storing_multiple_test::class, 'composition_id', 'id');
    }
    public function cfu_test(): HasMany
    {
        return $this->hasMany(Cfu_test::class, 'composition_id', 'id');
    }
    public function survivalrate_test(): HasMany
    {
        return $this->hasMany(Survivalrate_test::class, 'composition_id', 'id');
    }
    public function growthcurve_test(): HasMany
    {
        return $this->hasMany(growthcurve_test::class, 'composition_id', 'id');
    }
    public function mic_test(): HasMany
    {
        return $this->hasMany(Mic_test::class, 'composition_id', 'id');
    }
}

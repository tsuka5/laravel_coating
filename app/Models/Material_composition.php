<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Experiment;
use App\Models\Material;
use App\Models\Film_condition;
use App\Models\Charactaristic_test;
use App\Models\Storing_test;
use App\Models\Antibacteria_test;
use App\Models\Note;

class Material_composition extends Model
{
    use HasFactory;

    public $timestamps = false; 

    protected $fillable = [
        'experiment_id'
    ];

    public function experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
    // public function film_condition(): HasMany
    // {
    //     return $this->hasMany(Film_condition::class);
    // }
    public function charactaristic_test(): HasMany
    {
        return $this->hasMany(Charactaristic_test::class);
    }
    public function storing_test(): HasMany
    {
        return $this->hasMany(Storing_test::class);
    }
    public function antibacteria_test(): HasMany
    {
        return $this->hasMany(Antibacteria_test::class);
    }
    public function material(): Hasmany
    {
        return $this->hasMany(Material::class, 'id', 'composition_id' );
    }
    public function note(): HasMany
    {
        return $this->hasMany(Note::class);
    }
}

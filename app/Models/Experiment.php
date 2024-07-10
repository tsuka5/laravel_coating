<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Material_composition;
use App\Models\Film_condition;
use App\Models\Enzyme_test;
use App\Models\Storing_test;
use App\Models\Antibacteria_test;
use App\Models\Tga_test;

class experiment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'name' ,
        'date' ,
        'paper_name',
        'paper_url'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function material_composition(): HasMany
    {
        return $this->hasMany(Material_composition::class, 'experiment_id', 'id');
    }
    public function film_condition(): HasOne
    {
        return $this->hasOne(Film_condition::class);
    }
  
    public function storing_test(): HasMany
    {
        return $this->hasMany(Storing_test::class);
    }
    public function antibacteria_test(): HasMany
    {
        return $this->hasMany(Antibacteria_test::class);
    }
    public function tga_test(): HasMany
    {
        return $this->hasMany(Tga_test::class);
    }
    public function enzyme_test(): HasMany
    {
        return $this->hasMany(Enzyme_test::class);
    }
}


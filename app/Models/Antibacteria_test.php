<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Experiment;
use App\Models\Colony_test;
use App\Models\Bacteria_detail;
use App\Models\Antibacteria_test_type;



class Antibacteria_test extends Model
{
    use HasFactory;

    public $timestamps = false; //update_atなどを無効にする

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'experiment_id',
        'bacteria_id',
        'antibacteria_fruit_id',
        'test_id',
        'invivo_invitro',
        'bacteria_concentration',
        'mic',
    ];

    public function Experiment(): BelongsTo
    {
        return $this->belongsTo(Experiment::class);
    }
    public function bacteria_detail(): BelongsTo
    {
        return $this->belongsTo(Bacteria_detail::class, 'bacteria_id', 'id');
    }
    public function fruit_detail(): BelongsTo
    {
        return $this->belongsTo(Fruit_detail::class, 'antibacteria_fruit_id', 'id');
    }
    public function antibacteria_test_type(): BelongsTo
    {
        return $this->belongsTo(Antibacteria_test_type::class, 'test_id', 'id');
    }


}
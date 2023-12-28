<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\User;
use App\Models\Contact_reply;




class Contact extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'user_id',
        'title',
        'content',
        'reply',

    
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function contactReply(): hasOne
    {
        return $this->hasOne(Contact_reply::class, 'user_contact_id', 'id');
    }

 
}
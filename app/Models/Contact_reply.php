<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Admin;
use App\Models\Contact;




class Contact_reply extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    protected $fillable = [
        'admin_id',
        'user_contact_id',
        'title',
        'content',

    
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }
    public function contact(): BelongsTo
    {
        return $this->belongsTo(Contact::class, 'user_contact_id', 'id');
    }

 
}
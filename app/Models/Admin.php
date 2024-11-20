<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'receiver_id','id');
    }

    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'sender_id','id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }
}

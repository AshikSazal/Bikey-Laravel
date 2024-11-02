<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        "sender_id",
        "receiver_id",
        "message",
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    // For Admin chat if you have an Admin model
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'receiver_id');
    }
}

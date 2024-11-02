<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Verify;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $timestamps = false;
    protected $guard = "user";

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'verification'
    ];

    public function userVerification()
    {
        return $this->hasOne(Verify::class);
    }

    public function userCart()
    {
        return $this->hasOne(UserCart::class);
    }

    public function userAddress()
    {
        return $this->hasOne(UserAddress::class);
    }

    public function userPayment()
    {
        return $this->hasOne(UserPayment::class);
    }

    public function userOrder()
    {
        return $this->hasMany(UserOrder::class);
    }

    //  For chats only
    public function sentChats()
    {
        return $this->hasMany(Chat::class, 'sender_id');
    }

    public function receivedChats()
    {
        return $this->hasMany(Chat::class, 'receiver_id');
    }

    public function allChats()
    {
        return $this->sentChats()->union($this->receivedChats());
    }
}

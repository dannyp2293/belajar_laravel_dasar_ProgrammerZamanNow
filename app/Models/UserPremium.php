<?php

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // abaikan jika tidak pakai
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name','email','password',
        'is_premium','subscription_ends_at',
    ];

    protected $hidden = ['password','remember_token'];

    protected $casts = [
        'email_verified_at'   => 'datetime',
        'is_premium'          => 'boolean',
        'subscription_ends_at'=> 'datetime',
    ];
}

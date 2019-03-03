<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'access_token', 'provider', 'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Create / Update User From Social Login
     */
    public static function createFromSocialite($user, $provider)
    {
        return static::updateOrCreate([
            'email' => $user->getEmail()
        ], [
            'provider' => $provider,
            'provider_id' => $user->getId(),
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'access_token' => $user->token,
        ]);
    }
}

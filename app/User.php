<?php

namespace App;

//use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;



class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $fillable = [
        'id', 'firstname', 'lastname',
        'address', 'email', 'password', 'searchingForHelp',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function slist(): HasMany
    {
        return $this->hasMany ( Slist::class );
    }
    public function feedback() : HasMany
    {
        return $this->hasMany ( Feedback::class );
    }
    public function getJWTIdentifier()
    {
        return $this ->getKey();
    }
    public function getJWTCustomClaims()
    {
        return ['user'=>['id'=>$this->id, 'searchingForHelp'=>$this->searchingForHelp]];
    }


}

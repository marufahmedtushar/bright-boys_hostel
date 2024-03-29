<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone', 'email', 'password',
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


   

    public function rooms()
    {
        return $this->hasMany('App\Rooms');
    } 


    public function bill()
    {
        return $this->hasMany('App\Bill');
    }

    public function rating()
    {
        return $this->hasMany('App\Rating');
    }

    public function informations()
    {
        return $this->hasMany('App\Information');
    }
    

}

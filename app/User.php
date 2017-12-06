<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dob', 'role', 'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function transaction()
    {
        return $this->hasMany('App\TransactionHistory', 'userId');
    }

    public function library()
    {
        return $this->hasMany('App\GamesLibrary', 'userId');
    }

    public function cart()
    {
        return $this->hasMany('App\Cart', 'userId');
    }
}

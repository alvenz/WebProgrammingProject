<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $fillable = ['userId'];
    public function getUserId()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public function libraryDetail()
    {
        return $this->belongsTo('App\CartDetail', 'cartId');
    }
}

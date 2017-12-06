<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'cart_details';
    protected $fillable = ['cartId', 'productId', 'qty', 'purchaseDate'];
    public function myCart()
    {
        return $this->hasMany('App\Cart', 'cartId');
    }
    public function carts()
    {
        return $this->belongsTo('App\Product', 'productId');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'price', 'genreTypeId', 'rating_date', 'picture', 'rating'];
    public function genreType()
    {
        return $this->belongsTo('App\Genre', 'genreTypeId');
    }
    public function listGames()
    {
        return $this->hasMany('App\GamesLibraryDetail', 'productId');
    }

    public function listCarts()
    {
        return $this->hasMany('App\CartDetail', 'productId');
    }
}

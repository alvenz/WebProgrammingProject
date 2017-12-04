<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';
    protected $fillable = ['genreTypeName'];
    public function product()
    {
        return $this->hasMany('App\Product', 'genreTypeId');
    }
}

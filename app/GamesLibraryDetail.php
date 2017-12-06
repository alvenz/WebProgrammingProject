<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamesLibraryDetail extends Model
{
    protected $table = 'games_library_details';
    protected $fillable = ['gamesLibraryId', 'productId'];
    public function myLibrary()
    {
        return $this->hasMany('App\GamesLibrary', 'gamesLibraryId');
    }
    public function games()
    {
        return $this->belongsTo('App\Product', 'productId');
    }
}

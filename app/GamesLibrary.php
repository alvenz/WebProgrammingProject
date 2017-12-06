<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamesLibrary extends Model
{
    protected $table = 'games_libraries';
    protected $fillable = ['userId'];
    public function getUserId()
    {
        return $this->belongsTo('App\User', 'userId');
    }

    public function libraryDetail()
    {
        return $this->belongsTo('App\GamesLibraryDetail', 'gamesLibraryId');
    }
}

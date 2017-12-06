<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    protected $table = 'transaction_histories';
    protected $fillable = ['userId', 'transactionDate'];
    public function getUserId()
    {
        return $this->belongsTo('App\User', 'userId');
    }
}

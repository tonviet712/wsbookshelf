<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'author', 'price', 'url', 'orderer', 'status', 'note'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'orderer');
    }
}

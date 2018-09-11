<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email'
    ];

    protected $hidden = [
        'password'
    ];

    public function books()
    {
       return $this->hasMany('App\Book', 'orderer', 'id');
    }
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $primaryKey = 'id';
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name', 'email','password','role'
    ];

    protected $hidden = [
        'password'
    ];

    public function books()
    {
        return $this->hasMany('App\Book');
    }

    public function bookHistory()
    {
        return $this->belongsToMany('App\Book', 'borrowing_history');
    }

    public function isMember($request)
    {
        $data = $this->where('email', $request->input('email'))->get();
        return $data ? true : false;
    }

    public function scopeFilter($query, $request)
    {
        if ($request->has('sort')) {
            if ($request->input('sort') == 'admin') {
                $query->where('role',1) ;
            }
            if ($request->input('sort') == 'user') {
                $query->where('role',0);
            }
        }

        if ($request->has('q')) {
            $query->where('name', 'like', '%'.$request->input('q').'%');
        }
    }
}

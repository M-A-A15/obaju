<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $fillable = [
        'nama', 'email', 'password', 'level'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function cart(){
        return $this->hasMany('App\Cart', 'user_id', 'id');
    }

    public function delivery(){
        return $this->hasOne('App\Delivery', 'user_id', 'id');
    }
}

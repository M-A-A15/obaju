<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'cart';
    protected $fillable = [
        'user_id', 'barang_id', 'qty'
    ];

    public function barang() {
        return $this->hasOne('App\Barang', 'id', 'barang_id');
    }

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}

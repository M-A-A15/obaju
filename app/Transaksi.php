<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'user_id', 'status', 'total_harga', 'delivery_id'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function detail() {
        return $this->hasMany('App\DetailTransaksi', 'transaksi_id', 'id');
    }

    public function delivery() {
        return $this->hasOne('App\Delivery', 'id', 'delivery_id');
    }
}

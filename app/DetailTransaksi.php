<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $fillable = [
        'transaksi_id', 'barang_id', 'qty'
    ];

    public $timestamps = false;

    public function barang() {
        return $this->hasOne('App\Barang', 'id', 'barang_id');
    }
}

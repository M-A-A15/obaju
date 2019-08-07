<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use SoftDeletes;

    protected $table = 'barang';
    protected $fillable = [
        'nama_barang', 'deskripsi', 'kategori_id', 'harga', 'stok', 'gambar'
    ];

    public function kategori() {
        return $this->hasOne('App\Kategori', 'id', 'kategori_id');
    }
}

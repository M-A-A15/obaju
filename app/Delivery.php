<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';
    protected $fillable = [
        'user_id', 'alamat', 'kode_pos', 'no_telp', 'nama', 'email'
    ];

    public $timestamps = false;
}

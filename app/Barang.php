<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';

    protected $fillable = [
        'id',
        'nama',
        'harga',
        'jumlah',
        'foto',
        'supplier'
    ];
}

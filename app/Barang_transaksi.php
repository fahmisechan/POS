<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_transaksi extends Model
{
    protected  $table = 'barang_transaksi';

    protected $fillable = ['id','barang_id','code','jumlah'];

    public function Barang(){
    return $this->belongsTo(Barang::class);
    }

}

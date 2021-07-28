<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Contracts\Auth\Guard;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'code';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['code','konsumen','pembayaran','kembalian','total'];
    
    public function Barang_transaksi(){
        return $this->hasMany(Barang_transaksi::class,'code','code');
    }
}

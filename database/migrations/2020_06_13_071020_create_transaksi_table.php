<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->string('nama_barang');
            $table->string('customer');
            $table->integer('harga_barang');
            $table->integer('jumlah_barang');
            $table->integer('jumlah_bayar');
            $table->integer('jumlah_kembalian');
            $table->integer('sub_total');
            $table->integer('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}

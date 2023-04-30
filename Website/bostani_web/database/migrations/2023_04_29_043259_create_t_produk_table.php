<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_produk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kategori');
            $table->foreignId('id_sub_kategori')->nullable();
            $table->foreignId('id_vendor')->nullable();
            $table->string('nama_produk');
            $table->decimal('harga_jual_produk');
            $table->decimal('harga_beli_produk');
            $table->integer('ukuran_produk');
            $table->string('satuan_produk');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_produk');
    }
};

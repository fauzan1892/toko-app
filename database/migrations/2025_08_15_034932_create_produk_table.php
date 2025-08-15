<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('produk', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('slug')->unique();
        $table->unsignedBigInteger('id_kategori');
        $table->integer('harga')->default(0);
        $table->integer('stok')->default(0);
        $table->text('deskripsi')->nullable();
        $table->string('gambar')->nullable();
        $table->softDeletes();
        $table->timestamps();

        $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('produk');
}
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
{
    Schema::create('kategori', function (Blueprint $table) {
        $table->id();
        $table->string('nama_kategori');
        $table->string('slug')->unique();
        $table->softDeletes();
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('kategori');
}
}

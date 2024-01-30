<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->increments('id_menu');
            $table->unsignedInteger('id_kategori')
                ->foreign('id_kategori')->references('id_kategori')->on('kategori')->onDelete('cascade');
            $table->string('nama_menu');
            $table->string('foto_menu');
            $table->integer('harga');
            $table->string('product_knowladge');
            $table->string('desc');
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
        Schema::dropIfExists('menu');
    }
}

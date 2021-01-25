<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReturPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retur_pembelians', function (Blueprint $table) {
            $table->id();
            $table->integer('harga_beli');
            $table->integer('jumlah');
            $table->integer('total');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('sukucadang_id');
            $table->foreign('sukucadang_id')->references('id')->on('sukucadangs');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('pembelian_detail_id');
            $table->foreign('pembelian_detail_id')->references('id')->on('pembelian_details');
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
        Schema::dropIfExists('retur_pembelians');
    }
}

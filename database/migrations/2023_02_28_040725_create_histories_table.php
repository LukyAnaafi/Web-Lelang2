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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_lelang");
            $table->unsignedBigInteger("id_barang");
            $table->unsignedBigInteger("id_user");
            $table->unsignedBigInteger("penawaran_harga");
            $table->timestamps();

            $table->foreign('id_lelang')->references('id')->on('tb_lelang_15459')->onDelete('cascade');
            $table->foreign('id_barang')->references('id')->on('tb_barang_15459')->onDelete('cascade');
            $table->foreign('id_user')->references('id')->on('tb_masyarakat_15459')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('histories');
    }
};

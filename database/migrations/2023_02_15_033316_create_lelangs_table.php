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
        Schema::create('tb_lelang_15459', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_barang");
            $table->string("Tanggal_Lelang");
            $table->unsignedBigInteger("Harga_Akhir")->nullable();
            $table->unsignedBigInteger("id_user")->nullable();
            $table->string("Status");
            $table->timestamps();

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
        Schema::dropIfExists('lelangs');
    }
};

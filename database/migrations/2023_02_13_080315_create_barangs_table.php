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

        Schema::create('tb_barang_15459', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("Tanggal_Upload");
            $table->string("deskripsi");
            $table->unsignedBigInteger("Harga_Awal");
            $table->string("foto");


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
        Schema::dropIfExists('barangs');
    }
};

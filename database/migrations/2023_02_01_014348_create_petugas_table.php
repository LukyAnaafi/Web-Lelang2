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
        Schema::create('tb_petugas_15459', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("username");
            $table->string("password");
            $table->unsignedBigInteger("level_id");
            $table->timestamps();

            $table->foreign('level_id')->references('id_15459')->on('levels_15459')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_petugas_15459');
    }
};

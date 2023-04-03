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
        Schema::create('pemenangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_history");
            $table->unsignedBigInteger("id_user");
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('tb_masyarakat_15459')->onDelete('cascade');
            $table->foreign('id_history')->references('id')->on('histories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemenangs');
    }
};

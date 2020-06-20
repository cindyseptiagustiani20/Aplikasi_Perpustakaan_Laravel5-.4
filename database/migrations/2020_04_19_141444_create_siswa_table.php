<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->string('id_siswa')->primary();
            $table->string('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->string('id_ruang')->references('id_ruang')->on('ruang')->onDelete('cascade');
            $table->string('nama_siswa');
            $table->string('jk');
            $table->date('tgl_lahir');
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
        Schema::dropIfExists('siswa');
    }
}

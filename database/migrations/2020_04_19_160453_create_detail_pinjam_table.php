<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailPinjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjam', function (Blueprint $table) {
            $table->string('id_detail')->primary();
            $table->string('id_peminjaman')->references('id_peminjaman')->on('peminjaman')->onDelete('cascade');
            $table->string('id_buku')->references('id_buku')->on('buku')->onDelete('cascade');
            $table->integer('jml');
            $table->date('tgl_kembali');
            $table->integer('denda');
            $table->string('status_pinjam');
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
        Schema::dropIfExists('detail_pinjam');
    }
}

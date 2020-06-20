<?php

use Illuminate\Database\Seeder;

class DetailPinjamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\DetailPinjam::create([
        	'id_detail' => 'DP001',
        	'id_peminjaman' => 'P001',
        	'id_buku' => 'B001',
        	'jml' => 1,
        	'tgl_kembali' => '2020-05-24',
        	'denda' => 0,
        	'status_pinjam' => 0
        ]);
    }
}

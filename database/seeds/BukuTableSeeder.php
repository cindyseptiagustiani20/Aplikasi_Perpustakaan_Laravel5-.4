<?php

use Illuminate\Database\Seeder;

class BukuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Buku::create([
        	'id_buku' => 'B001',
        	'foto' => 'avatar.png',
        	'nama_buku' => 'Pemrograman Web',
        	'penulis' => 'Cindy Septi Agustiani',
        	'penerbit' => 'Erlangga',
        	'kondisi' => 'Baik',
        	'jumlah' => 99,
        	'id_kategori' => 'K001',
        	'id_user' => 'U001'
        ]);
    }
}

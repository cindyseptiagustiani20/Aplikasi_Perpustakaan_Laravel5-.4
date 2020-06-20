<?php

use Illuminate\Database\Seeder;

class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Kategori::create([
        	'id_kategori' => 'K001',
        	'nama_kategori' => 'Pemrograman',
        	'keterangan' => 'Buku-buku mengenai Pemograman'
        ]);
    }
}

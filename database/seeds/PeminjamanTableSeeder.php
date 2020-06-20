<?php

use Illuminate\Database\Seeder;

class PeminjamanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Peminjaman::create([
        	'id_peminjaman' => 'P001',
        	'id_user' => 'U003',
        	'tgl_pinjam' => '2020-05-02',
        	'jatuh_tempo' => '2020-05-05'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class RuangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Ruang::create([
        	'id_ruang' => 'R001',
        	'nama_ruang' => 'XII RPL 1',
        	'keterangan' => 'Ruang Kelas 12 RPL 1'
        ]);
    }
}

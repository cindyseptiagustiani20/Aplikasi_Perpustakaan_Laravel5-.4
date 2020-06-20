<?php

use Illuminate\Database\Seeder;

class SiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Siswa::create([
        	'id_siswa' => 'S001',
        	'id_user' => 'U003',
        	'id_ruang' => 'R001',
        	'nama_siswa' => 'cindy',
        	'jk' => 'P',
        	'tgl_lahir' => '2002-08-20'
        ]);
    }
}

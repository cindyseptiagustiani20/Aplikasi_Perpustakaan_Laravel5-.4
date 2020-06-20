<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
        	'id_user' => 'U001',
        	'nama_user' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => bcrypt('admin'),
        	'avatar' => 'avatar.png',
        	'level' => '0'
        ]);

        \App\User::create([
        	'id_user' => 'U002',
        	'nama_user' => 'petugas',
        	'email' => 'petugas@gmail.com',
        	'password' => bcrypt('petugas'),
        	'avatar' => 'avatar.png',
        	'level' => '1'
        ]);

        \App\User::create([
        	'id_user' => 'U003',
        	'nama_user' => 'cindy',
        	'email' => 'cindysepti20@gmail.com',
        	'password' => bcrypt('cindy'),
        	'avatar' => 'avatar.png',
        	'level' => '2'
        ]);
    }
}

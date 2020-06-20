<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SiswaTableSeeder::class);
        $this->call(RuangTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(BukuTableSeeder::class);
        $this->call(PeminjamanTableSeeder::class);
        $this->call(DetailPinjamTableSeeder::class);
    }
}

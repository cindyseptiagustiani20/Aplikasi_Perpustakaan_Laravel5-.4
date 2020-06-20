<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $primaryKey = 'id_kategori';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_kategori', 'nama_kategori', 'keterangan'];

    public function buku()
    {
    	return $this->hasMany(Buku::class, 'id_kategori', 'id_kategori');
    }
}

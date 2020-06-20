<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $table = 'ruang';
    protected $primaryKey = 'id_ruang';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_ruang', 'nama_ruang', 'keterangan'];


    public function siswa()
    {
    	return $this->hasMany(Siswa::class, 'id_ruang', 'id_ruang');
    }
}

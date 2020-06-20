<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id_siswa';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_siswa', 'id_user', 'id_ruang', 'nama_siswa','jk', 'tgl_lahir'];

    public function ruang()
    {
    	return $this->belongsTo(Ruang::class, 'id_ruang');
    }

    public function user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }
}

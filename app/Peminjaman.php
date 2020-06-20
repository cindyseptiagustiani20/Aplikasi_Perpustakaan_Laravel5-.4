<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_peminjaman', 'id_user', 'tgl_pinjam', 'jatuh_tempo', 'status_peminjaman'];

    public function user()
    {
    	return $this->belongsTo(User::class, 'id_user');
    }

    public function detail_pinjam()
    {
    	return $this->hasMany(DetailPinjam::class, 'id_peminjaman', 'id_peminjaman');
    }
}

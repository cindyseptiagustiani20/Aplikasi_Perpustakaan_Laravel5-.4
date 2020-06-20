<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    protected $table = 'detail_pinjam';
    protected $primaryKey = 'id_detail';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_detail', 'id_peminjaman', 'id_buku', 'tgl_kembali', 'denda', 'status_peminjaman'];

    public function peminjaman()
    {
    	return $this->belongsTo(Peminjaman::class, 'id_peminjaman');
    }

    public function buku()
    {
    	return $this->belongsTo(Buku::class, 'id_buku');
    }
}

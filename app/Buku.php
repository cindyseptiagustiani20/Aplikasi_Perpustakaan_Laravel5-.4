<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id_buku';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = ['id_buku', 'nama_buku', 'penulis', 'penerbit', 'jumlah', 'id_kategori', 'id_user'];

    public function getFoto()
    {
        return asset('foto/'.$this->foto);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function kategori()
    {
    	return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function detailpinjam()
    {
    	return $this->hasMany(DetailPinjam::class, 'id_buku', 'id_buku');
    }

    /*public static function boot()
    {
        parent::boot();

        static::deleting(function($buku) {
            $buku->detail_pinjam()->delete();
        });
    }
    */
}

<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_user';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'nama_user', 'email', 'password', 'avatar', 'level'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAvatar()
    {
        return asset('avatar/'.$this->avatar);
    }

    public function buku()
    {
        return $this->hasMany(Buku::class, 'id_user', 'id_user');
    }

    public function details()
    {
        return $this->hasManyThrough(DetailPinjam::class, Buku::class, 'id_user', 'id_buku', 'id_user', 'id_buku');
    }
    
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_user', 'id_user');
    }

    public function details2()
    {
        return $this->hasManyThrough(DetailPinjam::class, Peminjaman::class, 'id_user', 'id_peminjaman', 'id_user', 'id_peminjaman');
    }

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'id_user', 'id_user');
    }

}

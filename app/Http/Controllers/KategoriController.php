<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
    	$kategori = \App\Kategori::all();
    	$buku = \App\Buku::all();

    	return view('kategori.index', ['kategori' => $kategori, 'buku' => $buku]);
    }

    public function create(Request $request)
    {
    	$kategori = new \App\Kategori;
    	$kategori->id_kategori = $request->id_kategori;
    	$kategori->nama_kategori = $request->nama_kategori;
    	$kategori->keterangan = $request->keterangan;
    	$kategori->save();

    	return redirect('/kategori')->with('sukses', 'Data Berhasil Di Simpan');
    }

    public function uvedit($id)
    {
    	$kategori = \App\Kategori::find($id);

    	return view('kategori/uvedit', ['kategori' => $kategori]);
    }

    public function update(Request $request)
    {
    	$kategori = \App\Kategori::find($request->id_kategori);
    	$kategori->nama_kategori = $request->nama_kategori;
    	$kategori->keterangan = $request->keterangan;
    	$kategori->save();

    	return redirect('/kategori')->with('sukses', 'Data Berhasil Di Simpan');
    }
}

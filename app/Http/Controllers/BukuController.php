<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BukuController extends Controller
{
	public function index()
	{
		$buku = \App\Buku::all();
		$kategori = \App\Kategori::all();

		return view('buku.index', ['buku' => $buku, 'kategori' => $kategori]);
	}

	public function create(Request $request)
	{
		$buku = new \App\Buku;
		$buku->id_buku = $request->id_buku;
		$buku->nama_buku = $request->nama_buku;
		$buku->penulis = $request->penulis;
		$buku->penerbit = $request->penerbit;
		if ($request->hasFile('foto')) {
			$request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());

			$buku->foto = $request->file('foto')->getClientOriginalName();
		}
		else {
			$buku->foto = '';
		}
		$buku->kondisi = $request->kondisi;
		$buku->jumlah = $request->jumlah;
		$buku->id_kategori = $request->id_kategori;
		$buku->id_user = $request->id_user;
		$buku->save();

		return redirect('/buku')->with('sukses', 'Data Berhasil Di Simpan');
	}

	public function uvedit($id)
	{
		$buku = \App\Buku::find($id);
		$kategori = \App\Kategori::all();

		return view('buku/uvedit', ['buku' => $buku, 'kategori' => $kategori]);
	}

	public function update(Request $request)
	{
		$buku = \App\Buku::find($request->id_buku);
		if (isset($request->cek)) {
			if ($request->hasFile('foto')) {
				$request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());

				$buku->foto = $request->file('foto')->getClientOriginalName();
			}
		}
		$buku->nama_buku = $request->nama_buku;
		$buku->penulis = $request->penulis;
		$buku->penerbit = $request->penerbit;
		$buku->kondisi = $request->kondisi;
		$buku->jumlah = $request->jumlah;
		$buku->id_kategori = $request->id_kategori;
		$buku->id_user = $request->id_user;
		$buku->save();

		return redirect('/buku')->with('sukses', 'Data Berhasil Di Ubah');
	}
}

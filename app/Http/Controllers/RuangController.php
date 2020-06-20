<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RuangController extends Controller
{
    public function index()
    {
    	$ruang = \App\Ruang::all();
    	$siswa = \App\Siswa::all();

    	return view('ruang.index', ['ruang' => $ruang, 'siswa' => $siswa]);
    }

    public function create(Request $request)
    {
    	$ruang = new \App\Ruang;
    	$ruang->id_ruang = $request->id_ruang;
    	$ruang->nama_ruang = $request->nama_ruang;
    	$ruang->keterangan = $request->keterangan;
    	$ruang->save();

    	return redirect('/ruang')->with('sukses', 'Data Berhasil Di Simpan');
    }

    public function uvedit($id)
    {
    	$ruang = \App\Ruang::find($id);

    	return view('ruang/uvedit', ['ruang' => $ruang]);
    }

    public function update(Request $request)
    {
    	$ruang = \App\Ruang::find($request->id_ruang);
    	$ruang->nama_ruang = $request->nama_ruang;
    	$ruang->keterangan = $request->keterangan;
    	$ruang->save();

    	return redirect('/ruang')->with('sukses', 'Data Berhasil Di Ubah');
    }

    public function delete($id)
    {
        DeleteRuang($id);
        $siswa = \App\Siswa::where('id_ruang', $id);
        $siswa->delete();

        $ruang = \App\Ruang::find($id);
        $ruang->delete();

        return redirect('/ruang')->with('sukses', 'Data Berhasil Di Hapus');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
    	if (auth()->user()->level == '0' || auth()->user()->level == '1') {
            $peminjaman = \App\Peminjaman::all();
            $user = \App\User::where('level','2')->get();
            return view('peminjaman.index', ['peminjaman' => $peminjaman, 'user' => $user]);
        }
        else {
            $id_user = auth()->user()->id_user;
            $peminjaman = \App\Peminjaman::where('id_user', $id_user)->get();

            return view('peminjaman.index', ['peminjaman' => $peminjaman]);
        }
    }

    public function create(Request $request)
    {
        $peminjaman = new \App\Peminjaman;
        $peminjaman->id_peminjaman = $request->id_peminjaman;
        $peminjaman->id_user = $request->id_user;
        $peminjaman->tgl_pinjam = $request->tgl_pinjam;
        $peminjaman->jatuh_tempo = $request->jatuh_tempo;
        $peminjaman->save();

        return redirect('/peminjaman')->with('sukses', 'Data Berhasil Di Simpan');
    }

    public function delete($id)
    {
        $peminjaman = \App\Peminjaman::find($id);
        $peminjaman->detail_pinjam()->delete();
        $peminjaman->delete();

        return redirect('/peminjaman')->with('sukses', 'Data Berhasil Di Hapus');
    }
}

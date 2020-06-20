<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DetailPinjamController extends Controller
{
	public function index($id)
	{
		$peminjaman = \App\Peminjaman::find($id);
		$buku = \App\Buku::all();

		$detail_pinjam_pinjam = \App\DetailPinjam::where('id_peminjaman', $id)->where('status_pinjam', '0')->get();

		$detail_pinjam_kembali = \App\DetailPinjam::where('id_peminjaman', $id)->where('status_pinjam', '1')->get();

		$detail = \App\DetailPinjam::all();

		$tgl_pinjam = (new \Carbon\Carbon($peminjaman->tgl_pinjam))->addDays(1);
		$now = \Carbon\Carbon::now();

		return view('detailpinjam.index', ['peminjaman' => $peminjaman, 'buku' => $buku, 'pinjam' => $detail_pinjam_pinjam, 'kembali' => $detail_pinjam_kembali, 'detail' => $detail, 'now' => $now, 'tgl_pinjam' => $tgl_pinjam]);
	}

	public function create(Request $request)
	{
		$detail = new \App\DetailPinjam;
		$detail->id_detail = $request->id_detail;
		$detail->id_peminjaman = $request->id_peminjaman;
		$detail->id_buku = $request->id_buku;
		$detail->jml = 1;
		$detail->tgl_kembali = \Carbon\Carbon::now();
		$detail->denda = 0;
		$detail->status_pinjam = 0;
		$detail->save();

		$buku = \App\Buku::find($request->id_buku);
		$buku->jumlah = $buku->jumlah - 1;
		$buku->save();

		$id_peminjaman = $request->id_peminjaman;

		return redirect('/peminjaman/'.$id_peminjaman.'/detail_pinjam')->with('sukses', 'Buku Berhasil Di Pinjam');

	}

	public function delete($id)
	{
		$detail = \App\DetailPinjam::find($id);
		$id_peminjaman = $detail->id_peminjaman;
		$buku = \App\Buku::find($detail->id_buku);

		if ($detail->status_pinjam == '0') {
			$buku->jumlah = $buku->jumlah + $detail->jml;
			$buku->save();

			$detail->delete();
		}
		else {
			$detail->delete();
		}
		return redirect('/peminjaman/'.$id_peminjaman.'/detail_pinjam')->with('sukses', 'Data Berhasil Di Hapus');
	}
}

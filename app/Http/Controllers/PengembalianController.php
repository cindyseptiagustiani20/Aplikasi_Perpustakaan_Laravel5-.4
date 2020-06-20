<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengembalianController extends Controller
{
	public function index()
	{
		$detail = \App\DetailPinjam::all();
		return view('pengembalian.index', ['detail' => $detail]);
	}

	public function uvedit($id)
	{
		$detail = \App\DetailPinjam::find($id);

		return view('pengembalian/uvedit', ['detail' => $detail]);
	}

	public function update(Request $request)
	{
		$detail = \App\DetailPinjam::find($request->id_detail);
		$buku = \App\Buku::find($detail->id_buku);
		$peminjaman = \App\Peminjaman::find($detail->id_peminjaman);

		if ($detail->status_pinjam == '0') {
			if ($request->status_pinjam == '0') {
				return redirect('/pengembalian')->with('sukses', 'Data Berhasil Di Ubah');
			}
			else {
				$detail->tgl_kembali = \Carbon\Carbon::now();
				$tgl_kembali = \Carbon\Carbon::now();

				if ($tgl_kembali <= $peminjaman->jatuh_tempo) {
					$detail->status_pinjam = $request->status_pinjam;
					$detail->save();

					$buku->jumlah = $buku->jumlah + $detail->jml;
					$buku->save();
				}
				else {
					$date_jthtmp = \Carbon\Carbon::parse($peminjaman->jatuh_tempo);
					$date_kembali = \Carbon\Carbon::parse($tgl_kembali);
					$hari = $date_jthtmp->diffInDays($date_kembali);

					$denda = 1000 * $hari;
					$detail->denda = $denda;
					$detail->status_pinjam = $request->status_pinjam;
					$detail->save();

					$buku->jumlah = $buku->jumlah + $detail->jml;
					$buku->save();
				}

				return redirect('/pengembalian')->with('sukses', 'Data Berhasil Di Ubah');
			}
		}
		else {
			if ($request->status_pinjam == '1') {
				return redirect('/pengembalian')->with('sukses', 'Data Berhasil Di Ubah');
			}
			else {
					$detail->tgl_kembali = \Carbon\Carbon::now();
					$detail->denda = 0;
					$detail->status_pinjam = $request->status_pinjam;
					$detail->save();

					$buku->jumlah = $buku->jumlah - $detail->jml;
					$buku->save();
				
				return redirect('/pengembalian')->with('sukses', 'Data Berhasil Di Ubah');
			}
		}
	}

}

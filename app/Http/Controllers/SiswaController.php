<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
	public function index()
	{
		$siswa = \App\Siswa::all();
		$ruang = \App\Ruang::all();

		return view('siswa.index', ['siswa' => $siswa, 'ruang' => $ruang]);
	}

	public function create(Request $request)
	{
		$this->validate($request, [
            'email' => 'required|email|unique:users',
        ]);

		$user = new \App\User;
		$user->id_user = $request->id_user;
		$user->nama_user = $request->nama;
		$user->email = $request->email;
		$user->password = bcrypt($request->password);

		if (isset($request->cek)) {
			$user->avatar = 'avatar.png';
		}
		else {
			if ($request->hasFile('avatar')) {
				$request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());

				$user->avatar = $request->file('avatar')->getClientOriginalName();
			}
			else {
				$user->avatar = 'avatar.png';
			}
		}
		$user->level = '2';
		$user->save();

		$siswa = new \App\Siswa;
		$siswa->id_siswa = $request->id_siswa;
		$siswa->id_user = $request->id_user;
		$siswa->id_ruang = $request->id_ruang;
		$siswa->nama_siswa = $request->nama;
		$siswa->jk = $request->jk;
		$siswa->tgl_lahir = $request->tgl_lahir;
		$siswa->save();

		return redirect('/siswa')->with('sukses', 'Data Berhasil Di Simpan');

	}

	public function uvedit($id)
	{
		$siswa = \App\Siswa::find($id);
		$ruang = \App\Ruang::all();
		$user = \App\User::find($siswa->id_user);

		return view('siswa/uvedit', ['siswa' => $siswa, 'ruang' => $ruang, 'user' => $user]);
	}

	public function update(Request $request)
	{
		$user = \App\User::find($request->id_user);
		$user->nama_user = $request->nama;
		$user->email = $request->email;
		if (isset($request->cek)) {
			if ($request->hasFile('avatar')) {
				$request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());

				$user->avatar = $request->file('avatar')->getClientOriginalName();
			}
		}
		$user->save();

		$siswa = \App\Siswa::find($request->id_siswa);
		$siswa->id_ruang = $request->id_ruang;
		$siswa->nama_siswa = $request->nama;
		$siswa->jk = $request->jk;
		$siswa->tgl_lahir = $request->tgl_lahir;
		$siswa->save();

		return redirect('/siswa')->with('sukses', 'Data Berhasil Di Ubah');
	}

	public function uvpass($id)
	{
		$user = \App\User::find($id);

		return view('siswa/uvpass', ['user' => $user]);
	}

	public function passupdate(Request $request, $id)
	{
		$user = \App\User::find($id);
		$pass_lama = $request->pass_lama;

		if (Hash::check($pass_lama, $user->password)) {
			$user->password = bcrypt($request->pass_baru);
			$user->save();

			return redirect('/siswa')->with('sukses', 'Password Berhasil Di Ubah');
		}
		else {
			return redirect('/siswa')->with('gagal', 'Password Lama Salah');
		}
	}

	public function delete($id)
	{
    	$siswa = \App\Siswa::find($id);

    	$user = \App\User::find($siswa->id_user);
    	$user->details2()->delete();
    	$user->peminjaman()->delete();
    	$siswa->user()->delete();

    	$siswa->delete();

		return redirect('/siswa')->with('sukses', 'Data Berhasil Di Hapus');
	}
}

<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$user = \App\User::where('level', '0')->orwhere('level', '1')->get();

    	return view('user.index', ['user' => $user]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users',
        ]);
        
        $user = new \App\User;

        $user->id_user = $request->id_user;
        $user->nama_user = $request->nama_user;
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
        $user->level = $request->level;
        $user->save();

        return redirect('/user')->with('sukses', 'Data Berhasil Di Simpan');
    }

    public function uvedit($id)
    {
    	$user = \App\User::find($id);

    	return view('user/uvedit', ['user' => $user]);
    }

    public function update(Request $request)
    {
    	$id = $request->id_user;
    	$user = \App\User::find($id);
    	$user->nama_user = $request->nama_user;
    	$user->email = $request->email;
    	
    	if (isset($request->cek)) {
            if ($request->hasFile('avatar')) {
                $request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());

                $user->avatar = $request->file('avatar')->getClientOriginalName();
            }
        }
        $user->level = $request->level;
        $user->save();


        return redirect('/user')->with('sukses', 'Data Berhasil Di Ubah');
    }

    public function uvpass($id)
    {
    	$user = \App\User::find($id);
    	return view('user/uvpass', ['user' => $user]);
    }

    public function passupdate(Request $request, $id)
    {
    	$user = \App\User::find($id);

    	$pass_lama = $request->pass_lama;
    	if (Hash::check($pass_lama, $user->password)) {
    		$user->password = bcrypt($request->pass_baru);
    		$user->save();

    		return redirect('/user')->with('sukses', 'Password Berhasil Di Ubah');
    	}
    	else {
    		return redirect('/user')->with('gagal', 'Password Lama Salah');
    	}
    }
    
    public function delete($id)
    {
        $user = \App\User::find($id);

        $user->details()->delete();
        $user->buku()->delete();
        $user->delete();

        return redirect('/siswa')->with('sukses', 'Data Berhasil Di Hapus');
    }

    //profile
    public function profile()
    {
        $id = auth()->user()->id_user;

        $user = \App\User::find($id);

        return view('profile.index', ['user' => $user]);
    }

    public function uvprofile($id)
    {
        $user = \App\User::find($id);

        return view('profile/uvedit', ['user' => $user]);
    }

    public function updateprofile(Request $request)
    {
        if (auth()->user()->level == 2) {
            $user = \App\User::find($request->id_user);
            $siswa = \App\Siswa::where('id_user', $request->id_user);
            $siswa->nama_siswa = $request->nama_user;
            $siswa->save();

            $user->nama_user = $request->nama_user;
            $user->email = $request->email;

            if (isset($request->cek)) {
                if ($request->hasFile('avatar')) {
                    $request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());

                    $user->avatar = $request->file('avatar')->getClientOriginalName();
                }
            }

            $user->save();
        }
        else {
            $user = \App\User::find($request->id_user);
            
            $user->nama_user = $request->nama_user;
            $user->email = $request->email;

            if (isset($request->cek)) {
                if ($request->hasFile('avatar')) {
                    $request->file('avatar')->move('avatar/', $request->file('avatar')->getClientOriginalName());

                    $user->avatar = $request->file('avatar')->getClientOriginalName();
                }
            }

            $user->save();
        }

        return redirect('/profile')->with('sukses', 'Data Berhasil Di Ubah');
    }

    public function uvpassprofile($id)
    {
        $user = \App\User::find($id);
        return view('profile/uvpass', ['user' => $user]);
    }

    public function updatepassprofile(Request $request, $id)
    {
        $user = \App\User::find($id);

        $pass_lama = $request->pass_lama;
        if (Hash::check($pass_lama, $user->password)) {
            $user->password = bcrypt($request->pass_baru);
            $user->save();

            return redirect('/profile')->with('sukses', 'Password Berhasil Di Ubah');
        }
        else {
            return redirect('/profile')->with('gagal', 'Password Lama Salah');
        }
    }
}

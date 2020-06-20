<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function index()
    {
    	return view('auth.login');
    }
    public function postlogin(Request $request)
    {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => '2'])) {
    		return redirect('/dashboard')->with('sukses', 'Login Berhasil');
    	}
    	else {
    		return redirect('/login')->with('gagal', 'Email atau Password Anda Salah');
    	}
    }
    public function index2()
    {
    	return view('auth.login2');
    }
    public function postlogin2(Request $request)
    {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => '0'])) {
    		return redirect('/dashboard')->with('sukses', 'Login Berhasil');
    	}
    	elseif(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'level' => '1'])) {
    		return redirect('/dashboard')->with('sukses', 'Login Berhasil');
    	}
    	else {
    		return redirect('/admin')->with('gagal', 'Email atau Password Anda Salah');
    	}
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('sukses', 'Logout Berhasil');
    }

    public function logout2()
    {
        Auth::logout();
        return redirect('/admin')->with('sukses', 'Logout Berhasil');
    }
}

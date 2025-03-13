<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class LoginController extends Controller
{
    function index(){
        return view('auth.login');
    }

    function login (Request $request) {

        $request->validate([
    
            'email' => 'required',
    
            'password' => 'required'
    
        ], [
    
            'email.required' => 'Email wajib diisi',
    
            'password.required' => 'Password wajib diisi',
    
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            // Periksa peran pengguna setelah berhasil login
            if (Auth::user()->role == 'admin') {
                return redirect('/dashboardAdmin');
            } elseif (Auth::user()->role == 'manager') {
                return redirect('/dashboardManager');
            }
        } else {
            return redirect()->back()->withErrors(['email' => 'Email atau password salah'])->withInput();
        }
        
    }

    public function logout()
{
    Auth::logout(); // Logout dari sistem autentikasi
    return redirect('/'); // Arahkan kembali ke halaman utama
}

}

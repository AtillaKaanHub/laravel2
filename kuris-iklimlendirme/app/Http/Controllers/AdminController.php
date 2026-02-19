<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teklif;



class AdminController extends Controller
{

    public function teklifler()
{
    $teklifler = Teklif::latest()->get();

    return view('admin.teklifler', compact('teklifler'));
}

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            if (Auth::user()->role !== 'admin') {
                Auth::logout();
                return back()->with('error', 'Yetkisiz giriş!');
            }

            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Email veya şifre yanlış!');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}

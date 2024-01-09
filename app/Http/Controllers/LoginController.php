<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    // public function store(Request $request)
    // {
    //     dd($request->all());
    // }

    public function store(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password,
        ];

        if(Auth::attempt($data))
        {
            if(Auth::user()->role_id == '1')
            {
                return redirect('dashboard')->with('success', 'Anda berhasil login, ' . auth()->user()->name . ' 😄');
            }
            else if(Auth::user()->role_id == '2') {
                return redirect('dashboard')->with('success', 'Anda berhasil login, ' . auth()->user()->name . ' 😄');
            }
            else if(Auth::user()->role_id == '3') {
                return redirect('dashboard')->with('success', 'Anda berhasil login, ' . auth()->user()->name . ' 😄');
            }
            else if(Auth::user()->role_id == '4') {
                return redirect('dashboard')->with('success', 'Anda berhasil login, ' . auth()->user()->name . ' 😄');
            }
        }
        else
        {
            return redirect()->route('login')->with('failed', 'Email atau Password salah!');
        }
    }

    public function logout()
    {
        Auth::logout();
        // return redirect()->route('login')->with('success', 'Anda berhasil logout');
        return redirect('/')->with('success', 'Anda berhasil logout');
    }
}

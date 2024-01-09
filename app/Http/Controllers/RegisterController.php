<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use DB;


class RegisterController extends Controller
{
    public function index()
    {
        $datarole = Role::get();
        return view('auth.register', ['dataRole' => $datarole]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|unique:users,email|max:255',
            'role_id'   => 'required',
            'password'  => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'password'  => Hash::make($request->password),

        ]);

        $login = [
            'email'     => $request->email,
            'password'  => $request->password
        ];

        if (Auth::attempt($login))
        {
            return redirect()->route('dashboard')->with('success', 'Register akun berhasil');
        }
    }
}

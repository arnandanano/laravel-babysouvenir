<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('layouts.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datarole = Role::get();
        return view('layouts.user.create', ['dataRole' => $datarole]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|unique:users,email|max:255',
            'role_id'   => 'required',
            'password'  => 'required|string|min:6',
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'password'  => Hash::make($request->password),

        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $roles  = DB::table('roles')->get();
        $user   = User::where('slug', $slug)->first();

        return view('layouts.user.edit', compact(['user', 'roles']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $user = User::findOrFail($slug);

        $user->update($request->all());
        return redirect()->route('user.index')->with('success', 'Data User diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('user.index')->with('success', 'Data User dihapus');
    }
}

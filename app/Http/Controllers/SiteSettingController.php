<?php

namespace App\Http\Controllers;

use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = SiteSetting::first();
        return view('layouts.pengaturan.index', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $setting = SiteSetting::first();

        if($setting){
            // Untuk Update Data

            $setting->update([
                'nama_mitra' => $request->nama_mitra,
                'kontak_admin' => $request->kontak_admin,
                'email' => $request->email,
                'instagram_link' => $request->instagram_link,
                'tiktok_link' => $request->tiktok_link,
                'alamat_mitra' => $request->alamat_mitra,
                'tentang' => $request->tentang,
            ]);

            return redirect()->back()->with('success', 'Pengaturan disimpan');
        }
        else{
            // Untuk Create Data
            // dd($request->all());

            SiteSetting::create([
                'nama_mitra' => $request->nama_mitra,
                'kontak_admin' => $request->kontak_admin,
                'email' => $request->email,
                'instagram_link' => $request->instagram_link,
                'tiktok_link' => $request->tiktok_link,
                'alamat_mitra' => $request->alamat_mitra,
                'tentang' => $request->tentang,
            ]);

            return redirect()->back()->with('success', 'Pengaturan disimpan');
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

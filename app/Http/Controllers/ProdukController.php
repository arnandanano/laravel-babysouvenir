<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks = Produk::with('kategori')->get();
        return view('layouts.katalog-produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datakategori = Kategori::get();
        return view('layouts.katalog-produk.create', ['dataKategori' => $datakategori]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $newName = '';

        if($request->file('photo')){
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->nama_produk.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required',
            'ukuran' => 'required',
            'kategori_id' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png|image|max:5120',
        ]);

        Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'ukuran' => $request->ukuran,
            'kategori_id' => $request->kategori_id,
            'gambar' => $newName,
        ]);

        return redirect()->route('katalogproduk.index')->with('success', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('layouts.katalog-produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris  = DB::table('kategoris')->get();
        $produk     = Produk::where('id', $id)->first();

        return view('layouts.katalog-produk.edit', compact(['produk', 'kategoris']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $produk = Produk::findOrFail($id);

        $newName = '';

        $image_path = public_path('storage/photo/'.$produk->gambar);

        if($request->file('photo')){
            if(file_exists($image_path)){
                @unlink($image_path);
            }
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->nama_produk.'-'.now()->timestamp.'.'.$extension;
            $request->file('photo')->storeAs('photo', $newName);
        }

        $request->validate([
            'gambar' => 'mimes:jpg,jpeg,png|image|max:5120',
        ]);

        $produk = Produk::find($id)->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'ukuran' => $request->ukuran,
            'kategori_id' => $request->kategori_id,
            'gambar' => $newName,
        ]);

        return redirect()->route('katalogproduk.index')->with('success', 'Data Produk diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $produk = Produk::findOrFail($id);

        $image_path = public_path('storage/photo/'.$produk->gambar);

        if(file_exists($image_path)){
            unlink($image_path);
        }

        $produk->delete();
        return redirect()->route('katalogproduk.index')->with('success', 'Data Produk dihapus');
    }
}

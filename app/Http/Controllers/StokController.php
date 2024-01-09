<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Satuan;
use Illuminate\Http\Request;
use DB;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stoks = Stok::with('satuan')->get();
        return view('layouts.stok-barang.index', compact('stoks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datasatuan = Satuan::get();
        return view('layouts.stok-barang.create', ['dataSatuan' => $datasatuan]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'nama_stok'     => 'required|string|max:255',
            'jumlah'        => 'required',
            'satuan_id'     => 'required',
            'min_stok'     => 'required',
        ]);

        Stok::create([
            'nama_stok'     => $request->nama_stok,
            'jumlah'        => $request->jumlah,
            'satuan_id'     => $request->satuan_id,
            'min_stok'     => $request->min_stok,

        ]);

        return redirect()->route('stokbarang.index')->with('success', 'Stok Barang berhasil ditambahkan');
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
        $satuans  = DB::table('satuans')->get();
        $stok     = Stok::where('slug', $slug)->first();

        return view('layouts.stok-barang.edit', compact(['stok', 'satuans']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $stok = Stok::findOrFail($id);

        $stok->update($request->all());
        return redirect()->route('stokbarang.index')->with('success', 'Data Stok diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $stok = Stok::findOrFail($id);

        $stok->delete();
        return redirect()->route('stokbarang.index')->with('success', 'Data Stok dihapus');
    }

    public function getStok()
    {
        $dataStok = Stok::with('satuan')->get();

        return $dataStok;
    }

    public function cekStok()
    {
        $sisaStok = Stok::sum('jumlah');

        return response()->json(['sisaStok' => $sisaStok]);
    }
}

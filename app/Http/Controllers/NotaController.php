<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Produk;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataProduk = Produk::all();
        $notas = Nota::with(['relationToPembayaran','relationToProduk'])->orderBy('created_at', 'DESC')->get();
        return view('layouts.daftar-nota.index', compact(['notas', 'dataProduk']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataProduk = Produk::all();
        $pembayaran = Pembayaran::get();

        return view('layouts.daftar-nota.create', compact(['dataProduk', 'pembayaran']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        Nota::create($request->all());

        return redirect()->route('nota.index')->with('success', 'Data Nota ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $nota = Nota::with(['relationToProduk','relationToPembayaran'])->findOrFail($id);

        return view('layouts.daftar-nota.show', compact('nota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataProduk = Produk::all();
        $pembayarans = Pembayaran::get();
        $nota = Nota::where('id', $id)->first();

        return view('layouts.daftar-nota.edit', compact(['dataProduk', 'pembayarans', 'nota']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        Nota::where('id',$id)->update($request->only(
            'no_nota',
            'nama_pemesan',
            'produk_id',
            'harga',
            'qty',
            'tgl_acara',
            'pembayaran_id',
            'catatan'
        ));

        return redirect()->route('nota.index')->with('success', 'Data Nota ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $nota = Nota::findOrFail($id);
        $nota->delete();

        return redirect()->route('nota.index')->with('success', 'Data Nota dihapus');
    }
}

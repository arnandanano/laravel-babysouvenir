<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Produk;
use App\Models\ProgresProduksi;
use App\Models\Proses;
use Illuminate\Http\Request;

class ProgresProduksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $progres = ProgresProduksi::with('relationToProses', 'relationToNota')->orderBy('created_at', 'DESC')->get();
        return view('layouts.progres-produksi.index', compact('progres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = Produk::get();
        $proses = Proses::get();
        $nota = Nota::with('relationToProgresProduksi')->get();

        return view('layouts.progres-produksi.create', compact(['nota', 'barang', 'proses']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $progres = ProgresProduksi::create($request->all());

        if($progres) {
            return redirect()->route('progresproduksi.index')->with('success', 'Data Progres ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $progres = ProgresProduksi::with('relationToProduk', 'relationToProses')->findOrFail($id);
        return view('layouts.progres-produksi.show', compact('progres'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $listProses = Proses::get();
        $progres = ProgresProduksi::with('relationToProduk')->findOrFail($id);
        return view('layouts.progres-produksi.edit', compact('progres', 'listProses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());

        ProgresProduksi::where('id', $id)->update($request->only('proses_id'));

        return redirect()->route('progresproduksi.index')->with('success', 'Data Progres diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $progres = ProgresProduksi::findOrFail($id);
        $progres->delete();

        return redirect()->route('progresproduksi.index')->with('success', 'Data Progres dihapus');
    }

    public function getDataNota(string $id)
    {
        $nota = Nota::find($id);

        return $nota;
    }
}

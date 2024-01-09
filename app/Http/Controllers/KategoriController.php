<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Kategori::all();
        return view('layouts.kategori.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', 'Data kategori ditambahkan');
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
        $category = Kategori::where('slug', $slug)->first();

        return view('layouts.kategori.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $category = Kategori::findOrFail($slug);

        $category->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Data kategori diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Kategori::findOrFail($id);

        $category->delete();
        return redirect()->route('kategori.index')->with('success', 'Data kategori dihapus');
    }

    public function getKategori()
    {
        $datakategori = Kategori::with('relationToProduk')->get();

        return $datakategori;
    }
}

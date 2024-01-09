<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $satuans = Satuan::all();
        return view('layouts.satuan.index', compact('satuans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.satuan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        Satuan::create($request->all());

        return redirect()->route('satuan.index')->with('success', 'Data satuan ditambahkan');
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
        $satuan = Satuan::where('slug', $slug)->first();

        return view('layouts.satuan.edit', compact('satuan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $satuan = Satuan::findOrFail($slug);

        $satuan->update($request->all());
        return redirect()->route('satuan.index')->with('success', 'Data satuan diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $satuan = Satuan::findOrFail($id);

        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Data satuan dihapus');
    }

    public function getSatuan()
    {
        $dataSatuan = Satuan::with('relationToStok')->get();

        return $dataSatuan;

        // $datarole = Role::all();
        // return view('role', ['dataRole' => $datarole]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\Produk;
use App\Models\ProgresProduksi;
use Illuminate\Http\Request;

class TrackingOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('layouts.landing-page.tracking-order.tracking-order');
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
        //
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

    // public function search(Request $request)
    // {
    //     $keyword = $request->keyword;
    //     // $orders = ProgresProduksi::with('relationToNota', 'relationToProses')->where('no_nota', $keyword)->first();
    //     $orders = ProgresProduksi::with('relationToNota', 'relationToProses')
    //     ->whereHas('relationToNota', function($q) use ($keyword){
    //         $q->where('notas.no_nota', $keyword);
    //     })
    //     ->first();

    //     if($orders) {
    //         return response()->json($orders, 200);
    //     }
    //     return response()->json([], 400);
    // }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        // $orders = ProgresProduksi::with('relationToNota', 'relationToProses')->where('no_nota', $keyword)->first();
        $orders = ProgresProduksi::with('relationToNota', 'relationToProses')
        ->whereHas('relationToNota', function($q) use ($keyword){
            $q->where('notas.no_nota', $keyword);
        })
        ->first();

        $orders['produk_id'] = $orders->relationToProduk->nama_produk;

        $orders['proses_id'] = $orders->relationToProses->nama_proses;

        if($orders) {
            return response()->json($orders, 200);
        }
        return response()->json([], 400);
    }
}

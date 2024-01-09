<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $products = Produk::orderBy('nama_produk', 'ASC')->paginate(12);
        // return view('layouts.landing-page.produk.produk', ['products' => $products]);

        $products = Produk::query();

        // Sorting logic
        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'atoz':
                    $products->orderBy('nama_produk');
                    break;
                case 'ztoa':
                    $products->orderByDesc('nama_produk');
                    break;
                case 'lowtohigh':
                    $products->orderBy('harga');
                    break;
                case 'hightolow':
                    $products->orderByDesc('harga');
                    break;
                default:
                    // Default sorting, if any
                    $products->orderBy('nama_produk');
                    break;
            }
        }
        else {
            $products->orderBy('nama_produk');
        }

        $products = $products->paginate(12);

        return view('layouts.landing-page.produk.produk', ['products' => $products]);
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
}

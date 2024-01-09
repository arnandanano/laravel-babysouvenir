<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Nota;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LaporanPenjualanExport;

class LaporanPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salesReport = Nota::with('relationToProduk')->orderBy('created_at', 'DESC')->get();
        return view('layouts.laporan-penjualan.index', compact('salesReport'));
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

    public function filterDate(Request $request)
    {
        $startDate = Carbon::parse($request->input('start_date'));
        $endDate = Carbon::parse($request->input('end_date'));

        $salesReport = Nota::whereBetween('created_at', [$startDate, $endDate])->get();

        return view('layouts.laporan-penjualan.index', ['salesReport' => $salesReport]);
    }

    public function exportToExcel(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        return Excel::download(new LaporanPenjualanExport($startDate, $endDate), 'Laporan Penjualan'.' - '.now()->timestamp.'.xlsx');
    }
}

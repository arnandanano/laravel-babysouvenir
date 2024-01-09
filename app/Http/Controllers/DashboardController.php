<?php

namespace App\Http\Controllers;

use DB;
use Carbon\Carbon;
use App\Models\Nota;
use Illuminate\Http\Request;
use App\Models\ProgresProduksi;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlahNota = Nota::count();
        $sisaProgresProduksi = ProgresProduksi::where('proses_id', '!=', '8')->count();
        $total = Nota::select(DB::raw('sum(harga) as total'))->get();
        $pesanan = Nota::with(['relationToPembayaran','relationToProduk'])->orderBy('id', 'desc')->take(5)->get();

        $filter = $request->get('filter');

        switch ($filter) {
            case 'today':
                $filteredSales = Nota::whereDate('created_at', today())->sum('harga');
                break;
            case 'this_month':
                $filteredSales = Nota::whereMonth('created_at', now()->month)->sum('harga');
                break;
            case 'this_year':
                $filteredSales = Nota::whereYear('created_at', now()->year)->sum('harga');
                break;
            default:
            $filteredSales = Nota::whereDate('created_at', today())->sum('harga');
                break;
        }

        $formattedFilteredSales = $filteredSales !== null ? 'Rp. ' . number_format($filteredSales, 0, ',', '.') : 'Rp. 0';

        $salesData = Nota::select(DB::raw('sum(harga) as total, DATE(created_at) as date'))
        ->groupBy('date')
        ->orderBy('date')
        ->whereBetween('created_at', [now()->subMonth(), now()])
        ->get();

        $chartData = [];
        $chartLabels = [];
        foreach ($salesData as $data) {
            $chartData[] = $data->total;
            $chartLabels[] = date('d-m-Y', strtotime($data->date));
        }

        return view('layouts.dashboard.dashboard',
            compact('total', 'jumlahNota', 'sisaProgresProduksi', 'pesanan', 'formattedFilteredSales', 'filter',
            'chartData', 'chartLabels'));
    }
}

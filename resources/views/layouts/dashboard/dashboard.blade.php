@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-12">
            <div class="row">
                <!-- Nota Card -->
                <div class="col-md-4 col-sm-12">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Nota</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-receipt-cutoff"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $jumlahNota }}</h6>
                                    <span class="text-muted small pt-1">telah dibuat</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Nota Card -->

                <!-- Progres Produksi Card -->
                <div class="col-md-4 col-sm-12">
                    <div class="card info-card customers-card">
                        <div class="card-body">
                            <h5 class="card-title">Progres Produksi</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-ui-checks"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $sisaProgresProduksi }}</h6>
                                    @if ($sisaProgresProduksi >= 1)
                                        <span class="text-muted small pt-1">sedang berlangsung</span>
                                    @else
                                        <span class="text-muted small pt-1">Tidak ada progres produksi</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Progres Produksi Card -->

                <!-- Pendapatan Card -->
                <div class="col-md-4 col-sm-12">
                    <div class="card info-card revenue-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'today']) }}" name="filter">Hari ini</a></li>
                                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_month']) }}" name="filter">Bulan ini</a></li>
                                <li><a class="dropdown-item" href="{{ route('dashboard', ['filter' => 'this_year']) }}" name="filter">Tahun ini</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            @if(request('filter') == 'today')
                                <h5 class="card-title">Pendapatan <span>| Hari ini</span></h5>
                            @elseif(request('filter') == 'this_month')
                                <h5 class="card-title">Pendapatan <span>| Bulan ini</span></h5>
                            @elseif(request('filter') == 'this_year')
                                <h5 class="card-title">Pendapatan <span>| Tahun ini</span></h5>
                            @else
                                <h5 class="card-title">Pendapatan <span>| Hari ini</span></h5>
                            @endif
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    @if(request('filter') == 'today')
                                        <h6>{{ $formattedFilteredSales }}</h6>
                                    @elseif(request('filter') == 'this_month')
                                        <h6>{{ $formattedFilteredSales }}</h6>
                                    @elseif(request('filter') == 'this_year')
                                        <h6>{{ $formattedFilteredSales }}</h6>
                                    @else
                                        <h6>{{ $formattedFilteredSales }}</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Pendapatan Card -->
            </div>
        </div><!-- End Left side columns -->

        <!-- Grafik Penjualan -->
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Grafik Penjualan <span>| 1 bulan terakhir</span></h5>
                    <div id="chart"></div>
                </div>
            </div>
        </div><!-- End Grafik Penjualan -->

        <!-- Pemesanan Terbaru -->
        <div class="col-12">
            <div class="card overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Pemesanan Terbaru</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless text-nowrap">
                            <thead>
                                <tr>
                                    <th scope="col" width="12%">Order</th>
                                    <th scope="col" width="20%">Nama Pemesan</th>
                                    <th scope="col" width="20%">Barang</th>
                                    <th scope="col" width="12%">Qty</th>
                                    <th scope="col" width="20%">Harga</th>
                                    <th scope="col" width="20%">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pesanan as $nota)
                                <tr>
                                    <td class="align-middle">{{ $nota->no_nota }}</td>
                                    <td class="align-middle">{{ $nota->nama_pemesan }}</td>
                                    <td class="align-middle">{{ $nota->relationToProduk->nama_produk }}</td>
                                    <td class="align-middle">{{ $nota->qty }}</td>
                                    <td class="align-middle">{{ $nota->formatRupiah('harga') }}</td>
                                    <td class="align-middle">
                                        @if ($nota->relationToPembayaran->nama_pembayaran == 'Lunas')
                                            <span class="badge bg-success p-2">{{ $nota->relationToPembayaran->nama_pembayaran }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark p-2">{{ $nota->relationToPembayaran->nama_pembayaran }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- End Pemesanan Terbaru -->s

    </div>
</section>

@endsection

@push('chart')
<script>
    var chartData = @json($chartData);
    var chartLabels = @json($chartLabels);
    var formattedChartData = chartData.map(function(value) {
        return Number(value);
    });

    var options = {
        chart: {
            type: 'line'
        },
        series: [{
            name: 'Pendapatan',
            data: formattedChartData
        }],
        xaxis: {
            categories: chartLabels
        },
        yaxis: {
            labels: {
                formatter: function (value) {
                    return "Rp. " + Number(value).toLocaleString('id-ID');
                }
            },
        },
        tooltip: {
            y: {
                formatter: function (value) {
                    return "Rp. " + Number(value).toLocaleString('id-ID');
                }
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
@endpush

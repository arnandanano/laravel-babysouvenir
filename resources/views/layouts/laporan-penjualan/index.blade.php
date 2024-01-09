@extends('layouts.master')

@section('title', 'Daftar Nota')

@section('content')

<div class="pagetitle">
    <h1>Daftar Nota</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Daftar Nota

            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">Data Daftar Nota</div>
                <div class="card-body">

                    <form method="GET" action="{{ route('sales.export') }}">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="start_date" class="col-form-label">Start Date:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="start_date" class="form-control" name="start_date" required>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="end_date" class="col-form-label">End Date:</label>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="date" id="end_date" class="form-control" name="end_date" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-3 mb-3">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-file-earmark-x"></i> Export Excel
                            </button>
                        </div>
                    </form>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped nowrap" id="example" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center" width="12%">Tanggal</th>
                                    <th class="text-center" width="12%">Order</th>
                                    <th class="text-center" width="20%">Nama Pemesan</th>
                                    <th class="text-center" width="25%">Barang</th>
                                    <th class="text-center" width="12%">Qty</th>
                                    <th class="text-center" width="30%">Sub Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($salesReport as $nota)
                                <tr>
                                    <td class="align-middle text-center">{{ date('d-m-Y', strtotime($nota->created_at)) }}</td>
                                    <td class="align-middle text-center">{{ $nota->no_nota }}</td>
                                    <td class="align-middle">{{ $nota->nama_pemesan }}</td>
                                    <td class="align-middle">{{ $nota->relationToProduk->nama_produk }}</td>
                                    <td class="align-middle text-center">{{ $nota->qty }}</td>
                                    <td class="align-middle text-center">{{ $nota->formatRupiah('harga') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                {{-- </div> --}}
            </div>

        </div>
    </div>
</section>

@endsection


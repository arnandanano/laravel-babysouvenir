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
                    <div class="col-md-6 col-sm-12 mb-3 mt-3">
                        <a href="{{ route('nota.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Buat Nota</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped nowrap" id="example" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center">Order</th>
                                    <th class="text-center">Nama Pemesan</th>
                                    <th class="text-center">Barang</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Harga</th>
                                    <th class="text-center">Tanggal Acara</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($notas as $nota)
                                <tr>
                                    <td class="align-middle text-center">{{ $nota->no_nota }}</td>
                                    <td class="align-middle">{{ $nota->nama_pemesan }}</td>
                                    <td class="align-middle text-center">{{ $nota->relationToProduk->nama_produk }}</td>
                                    <td class="align-middle text-center">{{ $nota->qty }}</td>
                                    <td class="align-middle text-center">{{ $nota->formatRupiah('harga') }}</td>
                                    <td class="align-middle text-center">{{ Carbon\Carbon::parse($nota->tgl_acara)->translatedFormat('d F Y') }}</td>
                                    <td class="align-middle text-center">
                                        @if ($nota->relationToPembayaran->nama_pembayaran == 'Lunas')
                                            <span class="badge bg-success p-2">{{ $nota->relationToPembayaran->nama_pembayaran }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark p-2">{{ $nota->relationToPembayaran->nama_pembayaran }}</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('nota.show', $nota->id) }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('nota.edit', $nota->id) }}" class="btn btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('nota.destroy', $nota->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah yakin ingin menghapus data ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

@endsection

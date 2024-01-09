@extends('layouts.master')

@section('title', 'Katalog Produk')

@section('content')

<div class="pagetitle">
    <h1>Katalog Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Katalog Produk

            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">Data Katalog Produk</div>
                <div class="card-body">
                    <div class="col-md-6 col-sm-12 mb-3 mt-3">
                        <a href="{{ route('katalogproduk.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Buat Produk</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped nowrap" id="example" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center" width="6%">No.</th>
                                    <th class="text-center" width="15%">Nama Produk</th>
                                    <th class="text-center" width="10%">Harga</th>
                                    <th class="text-center" width="10%">Ukuran</th>
                                    <th class="text-center" width="10%">Kategori</th>
                                    <th class="text-center" width="19%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produks as $produk)
                                <tr>
                                    <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $produk->nama_produk }}</td>
                                    <td class="align-middle text-center">{{ $produk->formatRupiah('harga') }}</td>
                                    <td class="align-middle text-center">{{ $produk->ukuran }}</td>
                                    <td class="align-middle text-center">{{ $produk->kategori->nama_kategori }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('katalogproduk.show', $produk->id) }}" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" title="Detail">
                                            <i class="bi bi-eye"></i> Detail
                                        </a>
                                        <a href="{{ route('katalogproduk.edit', $produk->id) }}" class="btn btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('katalogproduk.destroy', $produk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah yakin ingin menghapus data ini?')">
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

@extends('layouts.master')

@section('title', 'Stok Barang')

@section('content')

<div class="pagetitle">
    <h1>Stok Barang</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Stok Barang

            </li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">Data Stok Barang</div>
                <div class="card-body">
                    <div class="col-md-6 col-sm-12 mb-3 mt-3">
                        <a href="{{ route('stokbarang.create') }}" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Buat Stok</a>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped nowrap" id="example" style="width: 100%">
                            <thead>
                                <tr>
                                    <th class="text-center" width="6%">No.</th>
                                    <th class="text-center" width="25%">Nama Barang</th>
                                    <th class="text-center" width="10%">Min Stok</th>
                                    <th class="text-center" width="10%">Sisa Stok</th>
                                    <th class="text-center" width="10%">Satuan</th>
                                    <th class="text-center" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stoks as $stok)
                                <tr>
                                    <td class="align-middle text-center">{{ $loop->iteration }}</td>
                                    <td class="align-middle">{{ $stok->nama_stok }}</td>
                                    <td class="align-middle text-center">{{ $stok->min_stok }}</td>
                                    <td class="align-middle text-end">{{ $stok->jumlah }}</td>
                                    <td class="align-middle">{{ $stok->satuan->nama_satuan }}</td>
                                    <td class="text-center">
                                        <a href="{{ url('stokbarang/'.$stok->slug.'/edit') }}" class="btn btn-warning text-white" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        <form action="{{ route('stokbarang.destroy', $stok->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah yakin ingin menghapus data ini?')">
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

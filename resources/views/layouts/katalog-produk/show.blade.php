@extends('layouts.master')

@section('title', 'Katalog Produk')

@section('content')

<div class="pagetitle">
    <h1>Katalog Produk</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Katalog Produk</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">Detail Data Katalog Produk</div>
                <div class="card-body">
                    <form method="GET" action="{{ route('katalogproduk.show', $produk->id) }}" class="row g-3 mt-0">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $produk->nama_produk }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" value="{{ $produk->harga }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ukuran</label>
                            <input type="text" class="form-control" name="ukuran" id="ukuran" value="{{ $produk->ukuran }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="kategori_id" id="kategori_id" value="{{ $produk->kategori->nama_kategori }}" readonly>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <a href="{{ route('katalogproduk.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Gambar</h5>
                    @if ($produk->gambar != '')
                        <img src="{{ asset('storage/photo/'.$produk->gambar) }}" class="img-fluid">
                    @else
                        <img src="{{ asset('img/no-image.jpg') }}" class="img-thumbnail">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

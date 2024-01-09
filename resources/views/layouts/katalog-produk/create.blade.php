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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Entri Data Katalog Produk</div>
                <div class="card-body col-lg-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('katalogproduk.store') }}" class="row g-3 mt-0" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ukuran</label>
                            <input type="text" class="form-control" name="ukuran" id="ukuran">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Kategori</label>
                            <select id="selectDropdown" name="kategori_id" class="form-select">
                                <option selected disabled>-- Pilih Kategori --</option>
                                @foreach ($dataKategori as $name)
                                    <option value="{{ $name->id }}">{{ $name->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="photo" id="photo" accept="image/*">
                        </div>
                </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('katalogproduk.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form><!-- Vertical Form -->
            </div>
            </div>
        </div>
    </div>
</section>

@endsection

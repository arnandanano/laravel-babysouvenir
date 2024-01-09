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
                <div class="card-header">Edit Data Katalog Produk</div>
                <div class="card-body col-lg-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('katalogproduk.update', $produk->id) }}" class="row g-3 mt-0" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control" name="nama_produk" id="nama_produk" value="{{ $produk->nama_produk }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" value="{{ $produk->harga }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Ukuran</label>
                            <input type="text" class="form-control" name="ukuran" id="ukuran" value="{{ $produk->ukuran }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Satuan</label>
                            <select id="selectDropdown" name="kategori_id" class="form-select" value="{{ $produk->kategori_id }}">
                                @foreach ($kategoris as $kategori)
                                    @if (old('kategori_id', $produk->kategori_id) == $kategori->id)
                                        <option value="{{ $produk->kategori_id }}" selected>{{ $kategori->nama_kategori }}</option>
                                    @else
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Gambar</label>
                            @if($produk->gambar != '')
                                <img src="{{ asset('storage/photo/'.$produk->gambar) }}" class="img-fluid">
                            @else
                                <img src="{{ asset('img/no-image.jpg') }}" class="img-thumbnail">
                            @endif
                            <input type="file" class="form-control mt-2" name="photo" id="photo" accept="image/*">
                        </div>
                </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('katalogproduk.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
            </div>
            </div>
        </div>
    </div>
</section>

@endsection

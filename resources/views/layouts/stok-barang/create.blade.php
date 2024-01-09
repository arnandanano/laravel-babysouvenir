@extends('layouts.master')

@section('title', 'Stok Barang')

@section('content')

<div class="pagetitle">
    <h1>Stok Barang</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Stok Barang</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Entri Data Stok Barang</div>
                <div class="card-body col-lg-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('stokbarang.store') }}" class="row g-3 mt-0">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Barang</label>
                            <input type="text" class="form-control" name="nama_stok" id="nama_stok">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="jumlah">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Satuan</label>
                            <select id="selectDropdown" name="satuan_id" class="form-select">
                                <option selected disabled>-- Pilih Satuan --</option>
                                @foreach ($dataSatuan as $name)
                                    <option value="{{ $name->id }}">{{ $name->nama_satuan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Minimal Stok</label>
                            <input type="text" class="form-control" name="min_stok" id="min_stok">
                        </div>
                </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('stokbarang.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form><!-- Vertical Form -->
            </div>
            </div>
        </div>
    </div>
</section>

@endsection

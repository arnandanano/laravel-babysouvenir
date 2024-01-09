@extends('layouts.master')

@section('title', 'Progres Produksi')

@section('content')

<div class="pagetitle">
    <h1>Progres Produksi</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Progres Produksi</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Detail Data Progres Produksi</div>
                <div class="card-body col-md-6">
                    <!-- Vertical Form -->
                    <form method="GET" action="{{ route('progresproduksi.show', $progres->id) }}" class="row g-3 mt-0">
                        @csrf
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Order</label>
                            <input type="text" class="form-control" name="no_nota" id="no_nota" value="{{ $progres->relationToNota->no_nota }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" value="{{ $progres->nama_pemesan }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Barang</label>
                            <input type="text" class="form-control" name="produk_id" id="produk_id" value="{{ $progres->relationToProduk->nama_produk }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Qty</label>
                            <input type="text" class="form-control" name="qty" id="qty" value="{{ $progres->qty }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Tanggal Acara</label>
                            <input type="text" class="form-control" name="tgl_acara" id="tgl_acara" value="{{ Carbon\Carbon::parse($progres->tgl_acara)->translatedFormat('d F Y') }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Proses</label>
                            <input type="text" class="form-control" name="proses_id" id="proses_id" value="{{ $progres->relationToProses->nama_proses }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Terakhir Update</label>
                            <input type="text" class="form-control" name="updated_at" id="updated_at" value="{{ Carbon\Carbon::parse($progres->updated_at)->translatedFormat('d F Y, H:i') }}" readonly>
                        </div>
                </div>
                        <div class="card-footer">
                            <a href="{{ route('progresproduksi.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form><!-- Vertical Form -->
            </div>
            </div>
        </div>
    </div>
</section>

@endsection

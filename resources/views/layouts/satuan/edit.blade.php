@extends('layouts.master')

@section('title', 'Satuan')

@section('content')

<div class="pagetitle">
    <h1>Satuan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Satuan</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Edit Data Satuan</div>
                <div class="card-body col-lg-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('satuan.update', $satuan->id) }}" class="row g-3 mt-0">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label">Satuan</label>
                            <input type="text" class="form-control" name="nama_satuan" value="{{ $satuan->nama_satuan }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ $satuan->slug }}">
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('satuan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

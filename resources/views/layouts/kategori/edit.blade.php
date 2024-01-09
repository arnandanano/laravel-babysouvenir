@extends('layouts.master')

@section('title', 'Kategori')

@section('content')

<div class="pagetitle">
    <h1>Kategori</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Kategori</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Edit Data Kategori</div>
                <div class="card-body col-lg-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('kategori.update', $category->id) }}" class="row g-3 mt-0">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label">Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" value="{{ $category->nama_kategori }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Slug</label>
                            <input type="text" class="form-control" name="slug" value="{{ $category->slug }}">
                        </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@extends('layouts.master')

@section('title', 'Testimonial')

@section('content')

<div class="pagetitle">
    <h1>Testimonial</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Testimonial</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Detail Data Testimonial</div>
                <div class="card-body col-lg-6">
                    <!-- Vertical Form -->
                    <form method="GET" action="{{ route('testimonial.show', $testimoni->id) }}" class="row g-3 mt-0">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Nama User</label>
                            <input type="text" class="form-control" name="nama_user" value="{{ $testimoni->nama_user }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Testimoni</label>
                            <p>{!! nl2br($testimoni->testimoni) !!}</p>
                            {{-- <textarea type="textarea" class="form-control" name="testimoni" id="testimoni" rows="5">{!! nl2br($testimoni->testimoni) !!}</textarea> --}}
                        </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('testimonial.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form><!-- Vertical Form -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

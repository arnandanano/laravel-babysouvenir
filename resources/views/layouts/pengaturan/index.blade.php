@extends('layouts.master')

@section('title', 'Pengaturan')

@section('content')

<div class="pagetitle">
    <h1>Pengaturan</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Pengaturan</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Pengaturan</div>
                <div class="card-body col-md-8">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('pengaturan.index') }}" class="row g-3 mt-0" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Nama Mitra</label>
                            <input type="text" class="form-control" name="nama_mitra" id="nama_mitra" value="{{ $setting->nama_mitra ?? '' }}">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Kontak Admin</label>
                            <input type="text" class="form-control" name="kontak_admin" id="kontak_admin" value="{{ $setting->kontak_admin ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="{{ $setting->email ?? '' }}">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Instagram</label>
                            <input type="text" class="form-control" name="instagram_link" id="instagram_link" value="{{ $setting->instagram_link ?? '' }}">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Tiktok</label>
                            <input type="text" class="form-control" name="tiktok_link" id="tiktok_link" value="{{ $setting->tiktok_link ?? '' }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" name="alamat_mitra" id="alamat_mitra" rows="5">{{ $setting->alamat_mitra ?? '' }}</textarea>
                        </div>
                        {{-- <div class="col-12">
                            <label class="form-label">File Katalog</label>
                            <input type="file" class="form-control" name="file" id="file">
                        </div> --}}
                        <div class="col-12">
                            <label class="form-label">Tentang</label>
                            <textarea class="form-control" name="tentang" id="tentang" rows="5">{{ $setting->tentang ?? '' }}</textarea>
                        </div>
                </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form><!-- Vertical Form -->
            </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('custom-scripts')
<script>
    $('#selectDropdown').change(function () {
        if(isNaN(parseInt($('#qty').val()))){
            $('#qty').val(1)
        }
        hitungTotal()
    })
    $('#qty').keyup(function () {
        if($(this).val() == ''){
            $(this).val(1)
        }
        if($('#selectDropdown').val() == '') {
            console.log('not selected product');
        } else {
            hitungTotal()
        }
    })
    function hitungTotal() {
        var valHarga = parseInt($("#selectDropdown").find(":selected").data("harga"))
        var harga = isNaN(valHarga) ? 0 : valHarga
        var qty = $('#qty').val()
        var total = harga*qty
        $('#harga').val(total)
    }
</script>
@endpush

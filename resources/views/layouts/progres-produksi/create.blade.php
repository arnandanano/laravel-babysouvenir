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
                <div class="card-header">Entri Data Progres Produksi</div>
                <div class="card-body col-md-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('progresproduksi.store') }}" class="row g-3 mt-0">
                        @csrf
                        <div class="col-12">
                            <label class="form-label">Order</label>
                            <select id="selectDropdown" name="no_nota" class="form-select">
                                <option selected disabled>-- Order --</option>
                                @foreach ($nota as $order)
                                    <option value="{{ $order->id }}">{{ $order->no_nota }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Barang</label>
                            <select id="selectDropdownProduk" name="produk_id" class="form-select">
                                <option selected disabled>-- Pilih Barang --</option>
                                @foreach ($barang as $produk)
                                    <option value="{{ $produk->id }}">{{ $produk->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Qty</label>
                            <input type="text" class="form-control" name="qty" id="qty">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Tanggal Acara</label>
                            <input type="date" class="form-control" name="tgl_acara" id="tgl_acara">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Proses</label>
                            <select id="proses_id" name="proses_id" class="form-select">
                                <option selected disabled>-- Proses Produksi --</option>
                                @foreach ($proses as $list)
                                    <option value="{{ $list->id }}">{{ $list->nama_proses }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('progresproduksi.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form><!-- Vertical Form -->
            </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('progres-scripts')
<script>
    $(document).ready(() => {
        $('#selectDropdownProduk').select2();
    })
    $('#selectDropdown').change(function (){
        // console.log($('#selectDropdown').val());
        var url = '{{ URL::to("/getdata-nota/:id") }}'
        url=url.replace(':id', $('#selectDropdown').val())
        console.log(url);
        $.get(url)
        .done((response) => {
            console.log(response);
            $('#nama_pemesan').val(response.nama_pemesan)
            $('#qty').val(response.qty)
            $('#tgl_acara').val(response.tgl_acara)
            $('#selectDropdownProduk').val(response.produk_id).trigger('change')
        })
    })
</script>
@endpush

@extends('layouts.master')

@section('title', 'Daftar Nota')

@section('content')

<div class="pagetitle">
    <h1>Daftar Nota</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bi bi-house-door"></i></a></li>
            <li class="breadcrumb-item">Daftar Nota</li>
            <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Detail Data Nota</div>
                <div class="card-body col-md-6">
                    <!-- Vertical Form -->
                    <form method="GET" action="{{ route('nota.show', $nota->id) }}" class="row g-3 mt-0">
                        @csrf
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Tanggal Pemesanan</label>
                            <input type="text" class="form-control" name="created_at" id="created_at" value="{{ Carbon\Carbon::parse($nota->created_at)->translatedFormat('d F Y') }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Order</label>
                            <input type="text" class="form-control" name="no_nota" id="no_nota" value="{{ $nota->no_nota }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" value="{{ $nota->nama_pemesan }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Barang</label>
                            <input type="text" class="form-control" name="produk_id" id="produk_id" value="{{ $nota->relationToProduk->nama_produk }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Qty</label>
                            <input type="number" class="form-control" name="qty" id="qty" value="{{ $nota->qty }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Tanggal Acara</label>
                            <input type="text" class="form-control" name="tgl_acara" id="tgl_acara" value="{{ Carbon\Carbon::parse($nota->tgl_acara)->translatedFormat('d F Y') }}" readonly>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Pembayaran</label>
                            <input type="text" class="form-control" name="pembayaran_id" id="pembayaran_id" value="{{ $nota->relationToPembayaran->nama_pembayaran }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Total</label>
                            <input type="text" class="form-control" name="harga" id="harga" value="{{ $nota->harga }}" readonly>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Catatan</label>
                            <textarea type="textarea" class="form-control" name="catatan" id="catatan" readonly>{{ $nota->catatan }}</textarea>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Terakhir Update</label>
                            <input type="text" class="form-control" name="updated_at" id="updated_at" value="{{ Carbon\Carbon::parse($nota->updated_at)->translatedFormat('d F Y, H:i') }}" readonly>
                        </div>
                </div>
                        <div class="card-footer">
                            <a href="{{ route('nota.index') }}" class="btn btn-secondary">Kembali</a>
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

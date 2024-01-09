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
                <div class="card-header">Edit Data Progres Produksi</div>
                <div class="card-body col-md-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('progresproduksi.update', $progres->id) }}" class="row g-3 mt-0">
                        @csrf
                        @method('PUT')
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
                            <select id="proses_id" name="proses_id" class="form-select">
                                @foreach ($listProses as $proses)
                                @if (old('pembayaran_id', $progres->proses_id) == $proses->id)
                                    <option value="{{ $progres->proses_id }}" selected>{{ $proses->nama_proses }}</option>
                                @else
                                    <option value="{{ $proses->id }}">{{ $proses->nama_proses }}</option>
                                @endif
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

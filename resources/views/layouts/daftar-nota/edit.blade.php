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
                <div class="card-header">Edit Data Nota</div>
                <div class="card-body col-md-6">
                    <!-- Vertical Form -->
                    <form method="POST" action="{{ route('nota.update', $nota->id) }}" class="row g-3 mt-0">
                        @csrf
                        @method('PUT')
                        <div class="col-12">
                            <label class="form-label">Order</label>
                            <input type="text" class="form-control" name="no_nota" id="no_nota" value="{{ $nota->no_nota }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Nama Pemesan</label>
                            <input type="text" class="form-control" name="nama_pemesan" id="nama_pemesan" value="{{ $nota->nama_pemesan }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Barang</label>
                            <select id="selectDropdown" name="produk_id" class="form-select" value="{{ $nota->produk_id }}">
                                @foreach ($dataProduk as $produk)
                                    @if (old('produk_id', $nota->produk_id) == $produk->id)
                                        <option data-harga="{{ $produk->harga }}" value="{{ $nota->produk_id }}" selected>{{ $produk->nama_produk }} ({{ ($produk->formatRupiah('harga')) }})</option>
                                    @else
                                        <option data-harga="{{ $produk->harga }}" value="{{ $produk->id }}">{{ $produk->nama_produk }} ({{ ($produk->formatRupiah('harga')) }})</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Qty</label>
                            <input type="text" class="form-control" name="qty" id="qty" value="{{ $nota->qty }}">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Tanggal Acara</label>
                            <input type="date" class="form-control" name="tgl_acara" id="tgl_acara" value="{{ $nota->tgl_acara }}">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label">Pembayaran</label>
                            <select id="pembayaran_id" name="pembayaran_id" class="form-select">
                                @foreach ($pembayarans as $pembayaran)
                                    @if (old('pembayaran_id', $nota->pembayaran_id) == $pembayaran->id)
                                        <option value="{{ $nota->pembayaran_id }}" selected>{{ $pembayaran->nama_pembayaran }}</option>
                                    @else
                                        <option value="{{ $pembayaran->id }}">{{ $pembayaran->nama_pembayaran }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Total</label>
                            <input type="text" class="form-control" name="harga" id="harga" value="{{ $nota->harga }}">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Catatan</label>
                            <textarea type="textarea" class="form-control" name="catatan" id="catatan">{{ $nota->catatan }}</textarea>
                        </div>
                </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('nota.index') }}" class="btn btn-secondary">Batal</a>
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

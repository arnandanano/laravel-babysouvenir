@extends('layouts.landing-page.master')

@section('title', 'Tracking Order')

@section('content')

<main id="main" class="main">
    <section class="contact section-bg">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Tracking Order</h2>
                <p>Lacak proses produksi souvenirmu</p>
            </div>
            <div class="row mt-2 justify-content-center">
                <div class="col-lg-7">
                    <div class="card border-0">
                        <div class="card-body">
                        <form id="formLacak">
                                {{-- @csrf --}}
                                <p>Masukkan Nomor Order pada kolom di bawah.</p>
                                <div class="form-group">
                                    <input type="search" class="form-control" name="order" id="order" value="" placeholder="Nomor Order">
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" id="cari" class="btn btn-primary px-3">Lacak</button>
                                </div>
                            </form>

                            <div id="hasilArea" class="mt-4">
                                <hr>
                                <div class="row">
                                    <label class="col-md-4 col-sm-12 col-form-label fw-bold">Nomor Order :</label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" readonly class="form-control-plaintext" id="no-order">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-sm-12 col-form-label fw-bold">Nama Pemesan :</label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" readonly class="form-control-plaintext" id="nama-pemesan">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-sm-12 col-form-label fw-bold">Barang :</label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" readonly class="form-control-plaintext" id="nama-barang">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-sm-12 col-form-label fw-bold">Jumlah :</label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" readonly class="form-control-plaintext" id="qty">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-sm-12 col-form-label fw-bold">Tanggal Acara :</label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" readonly class="form-control-plaintext" id="tgl-acara">
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-sm-12 col-form-label fw-bold">Status Proses :</label>
                                    <div class="col-md-8 col-sm-12">
                                        <span class="badge rounded-pill text-bg-warning">
                                            <input type="text" readonly class="form-control-plaintext text-center fw-bold" id="status-proses">
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-md-4 col-sm-12 col-form-label fw-bold">Terakhir diupdate pada :</label>
                                    <div class="col-md-8 col-sm-12">
                                        <input type="text" readonly class="form-control-plaintext" id="terakhir-update">
                                        <input type="text" readonly class="form-control-plaintext text-secondary" id="yang-lalu">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection

@push('includedJs')
<script>
    $(document).ready(()=>{
        $('#hasilArea').hide()
        $('#cari').click(function(e) {
            e.preventDefault()
            var keyword = $('#order').val()
            $.post('{{route("search")}}', {keyword:keyword})
            .done((response)=>{
                moment.locale('id');
                var tanggalAcara = moment(response.tgl_acara).format('DD MMMM YYYY')
                var waktuLalu = moment(response.updated_at).fromNow()
                var formattedUpdateJam = moment(response.updated_at).format('DD MMMM YYYY, HH:mm:ss')
                var quantity = response.qty + ' pcs'

                // console.log(response.nama_pemesan);
                $('#no-order').val(keyword)
                $('#nama-pemesan').val(response.nama_pemesan)
                $('#nama-barang').val(response.produk_id)
                $('#qty').val(quantity)
                $('#tgl-acara').val(tanggalAcara)
                $('#status-proses').val(response.proses_id)
                $('#terakhir-update').val(formattedUpdateJam)
                $('#yang-lalu').val(waktuLalu)
                $('#hasilArea').show()
            })
            .fail((error)=>{
                $('#hasilArea').hide()
                Swal.fire({
                    icon: "error",
                    text: "Nomor Order tidak terdaftar.",
                });
            })
        })
    })
</script>
@endpush

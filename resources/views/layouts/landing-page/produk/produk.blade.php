@extends('layouts.landing-page.master')

@section('title', 'Produk')

@section('content')

<main id="main" class="main">
    <section class="portfolio section-bg">
        <div class="container mt-5">
            <div class="section-title">
                <h2>Produk Kami</h2>
            </div>
            <div class="card-body d-flex">
                <form action="{{ url('/produk') }}" method="get" class="row g-3 mb-5 px-2">
                    <label class="form-label">Urutkan berdasarkan: </label>
                    <select name="sort" id="sort" onchange="this.form.submit()" class="form-select">
                        <option value="atoz" {{ request('sort') == 'atoz' ? 'selected' : '' }}>A - Z</option>
                        <option value="ztoa" {{ request('sort') == 'ztoa' ? 'selected' : '' }}>Z - A</option>
                        <option value="lowtohigh" {{ request('sort') == 'lowtohigh' ? 'selected' : '' }}>Harga (Rendah ke Tinggi)</option>
                        <option value="hightolow" {{ request('sort') == 'hightolow' ? 'selected' : '' }}>Harga (Tinggi ke Rendah)</option>
                    </select>
                </form>
            </div>
            <div class="row portfolio-container justify-content-center">
                @foreach ($products as $produk)
                <div class="col-lg-3 col-md-6 portfolio-item">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="{{ asset('storage/photo/'.$produk->gambar) }}" class="img-fluid" alt="">
                            <a href="{{ asset('storage/photo/'.$produk->gambar) }}" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox">
                                <i class="bx bx-search"></i>
                            </a>
                        </figure>
                        <div class="portfolio-info p-4">
                            <h4>{{ $produk->nama_produk }}</h4>
                            <p class="text-lowercase">{{ $produk->ukuran }} cm</p>
                            <p class="text-capitalize">{{ $produk->formatRupiah('harga') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">{!! $products->links() !!}</div>
        </div>
    </section>
</main>

@endsection

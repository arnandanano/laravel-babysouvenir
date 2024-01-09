@extends('layouts.landing-page.master')

@section('title', 'Supplier Souvenir Termurah')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex flex-column justify-content-center align-items-center">
    <div class="container text-center text-md-left" data-aos="fade-up">
        <h1>Selamat Datang di <span>{{ $appSetting->nama_mitra }}</span></h1>
        <h2>Supplier souvenir termurah, harga termurah se-Indonesia</h2>
        <a href="http://bit.ly/Babysouvenir_" class="btn-get-started scrollto">PESAN SEKARANG</a>
    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= What We Do Section ======= -->
    <section id="what-we-do" class="what-we-do">
        <div class="container">
            <div class="section-title">
                <h2>Cara Pemesanan</h2>
                {{-- <p>Magnam dolores commodi suscipit consequatur ex aliquid</p> --}}
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-journals"></i></i></div>
                        <h4>Pilih Produk</h4>
                        <p>Pilih produk yang ingin dipesan. Katalog produk bisa Anda lihat di website,<br>atau pada Instagram BabySouvenir</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-chat-right-text"></i></div>
                        <h4>Hubungi Kami</h4>
                        <p>Anda bisa menghubungi kami melalui kontak ini<br><br><b>No. Telp/ WA:</b><br>{{ $appSetting->kontak_admin }}</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-wallet"></i></div>
                        <h4>Pembayaran</h4>
                        <p>Pembayaran dengan DP 50% terlebih dahulu melalui transfer rekening<br>(belum termasuk ongkir)<br><br><b>BCA: </b>6140 726 999<br>Atas nama: CV BABY SOUVENIR</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0">
                    <div class="icon-box">
                        <div class="icon"><i class="bi bi-truck"></i></div>
                        <h4>Pengiriman</h4>
                        <p>Barang pesanan akan kami proses dan kirimkan setelah Anda melunasi pembayaran</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End What We Do Section -->

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('frontend/assets/img/about.png') }}" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0">
                    <h3>Tentang Kami</h3>
                    <p style="text-align: justify">{!! nl2br($appSetting->tentang) !!}</p>
                    <ul>
                        <li><i class="bx bx-check"></i> Kelahiran Bayi</li>
                        <li><i class="bx bx-check"></i> Pesta Baby Shower</li>
                        <li><i class="bx bx-check"></i> Ulang tahun anak</li>
                        <li><i class="bx bx-check"></i> Pernikahan</li>
                        <li><i class="bx bx-check"></i> Dan acara penting lainnya</li>
                    </ul>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">

            <div class="section-title">
                <h2>Mengapa Pilih BabySouvenir?</h2>
                {{-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem</p> --}}
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="icon-box">
                        <i class="bi bi-cash-coin"></i>
                        <h4>Harga Terjangkau</h4>
                        <p>Kami menjual souvenir dengan harga yang terjangkau, sehingga ramah buat kantong customer kami.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4 mt-lg-0">
                    <div class="icon-box">
                        <i class="bi bi-clock-history"></i>
                        <h4>Pengerjaan 7 - 10 hari</h4>
                        <p>Estimasi pengerjaan produksi kami kurang lebih antara 7 sampai 10 hari setelah acc desain dari customer.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="icon-box">
                        <i class="bi bi-truck"></i>
                        <h4>Pengiriman Ke Seluruh Indonesia</h4>
                        <p>Pengiriman souvenir bisa ke seluruh Indonesia, kami bekerja sama dengan berbagai ekspedisi seperti JNE, J&T, dll.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="icon-box">
                        <i class="bi bi-pencil-square"></i>
                        <h4>Free Custom Design</h4></h4>
                        <p>Customer bisa request desain yang dibantu tim desain atau menggunakan desain pribadi tanpa ada biaya tambahan.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="icon-box">
                        <i class="bi bi-handbag"></i>
                        <h4>First Hand</h4>
                        <p>Kami bukan reseller melainkan memproduksi barang kami sendiri, tentunya barang terjamin kualitasnya.</p>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="icon-box">
                        <i class="fa-regular fa-handshake mt-4"></i>
                        <h4>Open Reseller</h4>
                        <p>BabySouvenir membuka peluang kerjasama reseller untuk pembuatan souvenir.</p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
        <div class="container">

            <div class="section-title">
                <h2>Produk Terbaru</h2>
                {{-- <p>Sit sint consectetur velit quisquam cupiditate impedit suscipit</p> --}}
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <ul id="portfolio-flters">
                        <li data-filter="*" class="filter-active">Semua</li>
                        <li data-filter=".filter-app">Goodie Bag</li>
                        <li data-filter=".filter-card">Wooden</li>
                        {{-- <li data-filter=".filter-web">Web</li> --}}
                    </ul>
                </div>
            </div>

            <div class="row portfolio-container">
                @foreach ($produks as $produk)
                @if ($produk->kategori->nama_kategori == 'Tas Oscar')
                <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="{{ asset('storage/photo/'.$produk->gambar) }}" class="img-fluid" alt="">
                            <a href="{{ asset('storage/photo/'.$produk->gambar) }}" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="{{ $produk->nama_produk }}">
                                <i class="bx bx-search"></i>
                            </a>
                        </figure>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html">{{ $produk->nama_produk }}</a></h4>
                            <p>{{ $produk->kategori->nama_kategori }}</p>
                        </div>
                    </div>
                </div>

                @elseif ($produk->kategori->nama_kategori == 'Tas Kanvas')
                <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="{{ asset('storage/photo/'.$produk->gambar) }}" class="img-fluid" alt="">
                            <a href="{{ asset('storage/photo/'.$produk->gambar) }}" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="{{ $produk->nama_produk }}">
                                <i class="bx bx-search"></i>
                            </a>
                        </figure>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html">{{ $produk->nama_produk }}</a></h4>
                            <p>{{ $produk->kategori->nama_kategori }}</p>
                        </div>
                    </div>
                </div>

                @elseif ($produk->kategori->nama_kategori == 'Tas Mika')
                <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="{{ asset('storage/photo/'.$produk->gambar) }}" class="img-fluid" alt="">
                            <a href="{{ asset('storage/photo/'.$produk->gambar) }}" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="{{ $produk->nama_produk }}">
                                <i class="bx bx-search"></i>
                            </a>
                        </figure>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html">{{ $produk->nama_produk }}</a></h4>
                            <p>{{ $produk->kategori->nama_kategori }}</p>
                        </div>
                    </div>
                </div>

                @elseif ($produk->kategori->nama_kategori == 'Tas Leather')
                <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="{{ asset('storage/photo/'.$produk->gambar) }}" class="img-fluid" alt="">
                            <a href="{{ asset('storage/photo/'.$produk->gambar) }}" data-gallery="portfolioGallery" class="link-preview portfolio-lightbox" title="{{ $produk->nama_produk }}">
                                <i class="bx bx-search"></i>
                            </a>
                        </figure>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html">{{ $produk->nama_produk }}</a></h4>
                            <p>{{ $produk->kategori->nama_kategori }}</p>
                        </div>
                    </div>
                </div>

                {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="assets/img/portfolio/portfolio-2.jpg" class="img-fluid" alt="">
                            <a href="assets/img/portfolio/portfolio-2.jpg" class="link-preview portfolio-lightbox"
                                data-gallery="portfolioGallery" title="Preview"><i class="bx bx-plus"></i></a>
                            <a href="portfolio-details.html" class="link-details" title="More Details"><i
                                    class="bx bx-link"></i></a>
                        </figure>

                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html">Web 3</a></h4>
                            <p>Web</p>
                        </div>
                    </div>
                </div> --}}

                @elseif ($produk->kategori->nama_kategori == 'Wooden')
                <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
                    <div class="portfolio-wrap">
                        <figure>
                            <img src="{{ asset('storage/photo/'.$produk->gambar) }}" class="img-fluid" alt="">
                            <a href="{{ asset('storage/photo/'.$produk->gambar) }}" class="link-preview portfolio-lightbox" data-gallery="portfolioGallery" title="{{ $produk->nama_produk }}">
                                <i class="bx bx-search"></i>
                            </a>
                        </figure>
                        <div class="portfolio-info">
                            <h4><a href="portfolio-details.html">{{ $produk->nama_produk }}</a></h4>
                            <p>{{ $produk->kategori->nama_kategori }}</p>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimoni Section ======= -->
    <section id="testimoni" class="testimonials section-bg">
        <div class="container">
            <div class="section-title">
                <h2>Testimoni</h2>
                <p>Testimoni dapat dilihat juga pada Highlight Instagram kami</p>
            </div>
            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @foreach ($testimonial as $testimoni)
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                {!! nl2br($testimoni->testimoni) !!}
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <h3 class="mt-4">{{ $testimoni->nama_user }}</h3>
                        </div>
                    </div><!-- End testimonial item -->
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section><!-- End Testimoni Section -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="section-title">
                <h2>F. A. Q</h2>
                <p>Frequently Asked Questions</p>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <!-- F.A.Q List 1-->
                    <div class="accordion accordion-flush" id="faqlist1">
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-1">
                                    Bagaimana cara memesan souvenir di BabySouvenir?
                                </button>
                            </h2>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    Hubungi kontak admin pada nomor {{ $appSetting->kontak_admin }} atau klik tombol Whatsapp di bagian kanan bawah website ini.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-2">
                                    Apakah bisa custom desain pada souvenir?
                                </button>
                            </h2>
                            <div id="faq-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    Tentu bisa kak, nanti tim desain kami akan membantu untuk meng-custom desain nya sesuai dengan request. Atau bisa juga menggunakan desain pribadi dari kakak.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-3">
                                    Berapa minimal jumlah pemesanan souvenir nya?
                                </button>
                            </h2>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist1">
                                <div class="accordion-body">
                                    Minimal pemesanan 24pcs. Apabila sebelumnya sudah memesan dengan minimal 24pcs kemudian ada tambahan, untuk tambahan pesanan ini minimal 12pcs.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-6">

                    <!-- F.A.Q List 2-->
                    <div class="accordion accordion-flush" id="faqlist2">

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2-content-1">
                                    Berapa lama proses produksi souvenirnya?
                                </button>
                            </h2>
                            <div id="faq2-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    Estimasi proses produksi nya antara 7 - 10 hari.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2-content-2">
                                    Metode pembayarannya via apa?
                                </button>
                            </h2>
                            <div id="faq2-content-2" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    Pembayaran via BCA dengan No. Rek 6140 726 999, atas nama CV BABY SOUVENIR
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2-content-3">
                                    Kapan barang akan dikirim setelah produksi?
                                </button>
                            </h2>
                            <div id="faq2-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist2">
                                <div class="accordion-body">
                                    Sebelum mengirim barang, kami mengirimkan foto barang jadi terlebih dahulu ke customer.
                                    Jika sudah oke dan customer melunasi pembayaran, maka kami akan melakukan packing kemudian dikirim.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section><!-- End F.A.Q Section -->

</main><!-- End #main -->

@endsection

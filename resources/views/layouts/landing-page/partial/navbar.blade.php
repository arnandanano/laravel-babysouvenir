<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

        <div class="logo me-auto">
            <a href="/"><img src="{{asset('frontend/assets/img/logo-bs.png')}}" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a class="nav-link scrollto" href="/">Home</a></li>
                <li><a class="nav-link scrollto" href="/#about">Tentang Kami</a></li>
                <li><a class="nav-link scrollto" href="/#testimoni">Testimoni</a></li>
                <li><a class="{{ (Request::is('produk*')) ? 'active' : 'collapsed' }} nav-link" href="/produk">Produk</a></li>
                <li><a class="{{ (Request::is('tracking-order*')) ? 'active' : 'collapsed' }} nav-link" href="/tracking-order">Tracking Order</a></li>
                <li>
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <div class="header-social-links d-flex align-items-center">
            <a href="{{ $appSetting->instagram_link }}" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="{{ $appSetting->tiktok_link }}" class="tiktok"><i class="bi bi-tiktok"></i></a>
        </div>

    </div>
</header><!-- End Header -->

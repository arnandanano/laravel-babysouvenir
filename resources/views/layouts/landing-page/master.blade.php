<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        {{ config('app.name') }} | @yield('title')
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">

    @include('layouts.landing-page.partial.style')
</head>

<body>
    @include('layouts.landing-page.partial.navbar')

    @yield('content')

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h4>Kontak Kami</h4>
                        <h6>Alamat:</h6>
                        <p>{!! nl2br($appSetting->alamat_mitra) !!}</p>
                        <br>
                        <h6>No. Telp/ WA: </h6>
                        <p>{{ $appSetting->kontak_admin }}</p>
                        <br>
                        <h6>Email: </h6>
                        <p>{{ $appSetting->email }}</p>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h4>Jam Operasional</h4>
                        <h6>Senin - Sabtu: </h6>
                        <p>08.00 - 18.00</p>
                        <br>
                        <h6>Minggu: </h6>
                        <span class="badge bg-danger py-2 px-3">Tutup</span>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-contact">
                        <h4>Pembayaran</h4>
                        <h6>BCA: </h6>
                        <p>6140 726 999</p>
                        <br>
                        <h6>Atas nama: </h6>
                        <p>CV BABY SOUVENIR</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start align-self-center">
                <div class="copyright">
                    {{-- &copy; Copyright <strong><span>Lumia</span></strong>. All Rights Reserved --}}
                    &copy; <strong><span>{{ $appSetting->nama_mitra }}</span></strong>. All Rights Reserved
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="{{ $appSetting->instagram_link }}" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="{{ $appSetting->tiktok_link }}" class="tiktok"><i class="bx bxl-tiktok"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center mb-5">
        <i class="bi bi-arrow-up-short"></i>
    </a>
    <div class="float">
        <a href="http://bit.ly/Babysouvenir_" class="float">
            <i class="fa-brands fa-whatsapp my-float"></i>Whatsapp
        </a>
    </div>

    @include('layouts.landing-page.partial.script')

    @if(session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 2250,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "success",
            title: "{{ Session::get('success') }}"
        });
    </script>
    @endif

    <script src="{{ asset('/sw.js') }}"></script>
    <script>
    if ("serviceWorker" in navigator) {
        // Register a service worker hosted at the root of the
        // site using the default scope.
        navigator.serviceWorker.register("/sw.js").then(
        (registration) => {
            console.log("Service worker registration succeeded:", registration);
        },
        (error) => {
            console.error(`Service worker registration failed: ${error}`);
        },
        );
    } else {
        console.error("Service workers are not supported.");
    }
    </script>

    @stack('includedJs')

</body>

</html>

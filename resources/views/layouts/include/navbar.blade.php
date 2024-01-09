<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('backend/assets/img/apple-touch-icon.png') }}" alt="">
            <span class="d-none d-lg-block">{{ config('app.name') }}</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            {{-- <li class="nav-item dropdown">

                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">4</span>
                </a><!-- End Notification Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have 4 new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    <li class="notification-item">
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        <div id="dropdownStok">
                            <h4></h4>
                            <p></p>
                            <p></p>
                        </div>
                    </li>
                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Notification Nav --> --}}

            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ Avatar::create( auth()->user()->name )->toBase64() }}" alt="Profile"/>
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
                </a><!-- End Profile Image Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->name }}</h6>
                        <span>{{ auth()->user()->role->nama_role }}</span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- End Header -->

@push('notifikasi')
<script>
    function cekStok() {
        $.ajax({
            url: '{{ route('cek-stok') }}',
            method: 'GET',
            success: function(response) {
                $('#dropdownStok').html('Sisa Stok: ' + response.sisaStok);
            },
            error: function(error) {
                console.error('Error fetching stok data:', error);
            }
        });
    }

    // Panggil fungsi cekStok saat halaman dimuat
    $(document).ready(function() {
        cekStok();

        // Perbarui stok setiap beberapa detik (misalnya, setiap 5 detik)
        setInterval(cekStok, 5000); // Ganti dengan interval yang diinginkan
    });
</script>
@endpush

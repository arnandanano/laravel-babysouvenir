<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>
        @yield('title')
    </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef"/>
    <link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">


    @include('layouts.include.style')

</head>

<body>

    @include('layouts.include.navbar')

    @include('layouts.include.sidebar')

    <main id="main" class="main">

        @yield('content')

    </main><!-- End #main -->

    <!-- Footer tidak dipanggil -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    @include('layouts.include.script')

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

    <script>
        $(document).ready(function() {
            $('#selectDropdown').select2();
        });
    </script>

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

    @stack('sidebar')
    @stack('custom-scripts')
    @stack('progres-scripts')
    @stack('chart')
    @stack('export-laporan')
    @stack('notifikasi')

</body>

</html>

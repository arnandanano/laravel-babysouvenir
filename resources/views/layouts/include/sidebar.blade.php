<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        @canany(['isSuperuser','isOwner','isAdminproduksi','isDesain'])
        <li class="nav-item">
            <a class="{{ (Request::is('dashboard')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        @endcanany

        @canany(['isSuperuser','isOwner','isDesain'])
        <li class="nav-item">
            <a class="{{ (Request::is('nota*')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('nota.index') }}">
                <i class="bi bi-receipt-cutoff"></i>
                <span>Daftar Nota</span>
            </a>
        </li><!-- End Daftar Nota Page Nav -->
        @endcanany

        @canany(['isSuperuser','isOwner','isDesain'])
        <li class="nav-item">
            <a class="{{ (Request::is('katalogproduk*')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('katalogproduk.index') }}">
                <i class="bi bi-journals"></i>
                <span>Katalog Produk</span>
            </a>
        </li><!-- End Katalog Produk Page Nav -->
        @endcanany

        @canany(['isSuperuser','isAdminproduksi'])
        <li class="nav-item">
            <a class="{{ (Request::is('progresproduksi*')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('progresproduksi.index') }}">
                <i class="bi bi-ui-checks"></i>
                <span>Progres Produksi</span>
            </a>
        </li><!-- End Progres Produksi Page Nav -->
        @endcanany

        @canany(['isSuperuser','isOwner'])
        <li class="nav-item">
            <a class="{{ (Request::is('laporanpenjualan*')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('laporanpenjualan.index') }}">
                <i class="bi bi-coin"></i>
                <span>Laporan Penjualan</span>
            </a>
        </li><!-- End Laporan Penjualan Page Nav -->
        @endcanany

        @canany(['isSuperuser','isAdminproduksi'])
        <li class="nav-item">
            <a class="{{ (Request::is('stokbarang*')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('stokbarang.index') }}">
                <i class="bi bi-database"></i>
                <span>Stok Barang</span>
            </a>
        </li><!-- End Stok Barang Page Nav -->
        @endcanany

        @can('isSuperuser')
        <li class="nav-heading">Superuser</li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#datamaster-nav" data-bs-toggle="collapse" href="#" aria-expanded="false">
                <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="datamaster-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="/kategori" class="{{ Request::is('kategori*') ? 'active' : 'collapsed' }} nav-link">
                        <i class="bi bi-circle"></i><span>Kategori</span>
                    </a>
                </li>
                <li>
                    <a href="/satuan" class="{{ Request::is('satuan*') ? 'active' : 'collapsed' }} nav-link">
                        <i class="bi bi-circle"></i><span>Satuan</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Data Master Page Nav -->
        <li class="nav-item">
            <a class="{{ (Request::is('user*')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('user.index') }}">
                <i class="bi bi-people"></i>
                <span>User</span>
            </a>
        </li><!-- End User Nav -->
        <li class="nav-item">
            <a class="{{ (Request::is('testimonial*')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('testimonial.index') }}">
                <i class="bi bi-chat-quote"></i>
                <span>Testimonial</span>
            </a>
        </li><!-- End Testimonial Nav -->
        <li class="nav-item">
            <a class="{{ (Request::is('pengaturan*')) ? 'active' : 'collapsed' }} nav-link" href="{{ route('pengaturan.index') }}">
                <i class="bi bi-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li><!-- End Pengaturan Nav -->
        @endcan

    </ul>

</aside>
<!-- End Sidebar-->

@push('sidebar')
<script>
    $(document).ready(function () {
        var currentPath = window.location.pathname;
        var currentLink = $('.nav-link[href="' + currentPath + '"]');

        if (currentLink.length > 0) {
            var parentLi = currentLink.closest('li.nav-item');

            if (parentLi.length > 0) {
                parentLi.find('.nav-content').addClass('show');
            }
        }
    });
</script>
@endpush

@if (Request::segment(1) != 'login')
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading">Core</div>
                    <div class="sidenav-menu-heading">Dashboard</div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseComponents" aria-expanded="false" aria-controls="collapseComponents">
                        <div class="nav-link-icon"><i data-feather="package"></i></div>
                        Pusat Informasi Desa
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseComponents" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('region') }}">Data Desa</a>
                            <a class="nav-link" href="{{ route('vaccine') }}">Data Stok Vaksinasi Kecamatan Semboro</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="false" aria-controls="collapseUtilities">
                        <div class="nav-link-icon"><i data-feather="tool"></i></div>
                        Pusat Informasi Pelaksanaan Vaksinasi
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseUtilities" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav">
                            <a class="nav-link" href="{{ route('posko') }}">Data Daftar Posko Pelayanan</a>
                            <a class="nav-link" href="{{ route('event') }}">Data Kegiatan Vaksinasi</a>
                        </nav>
                    </div>
                    <div class="sidenav-menu-heading">Precentage</div>
                    <a class="nav-link" href="{{ route('graphic') }}">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Grafik Pelaksanaan Vaksinasi
                    </a>
                </div>
            </div>
            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title">Valerie Luna</div>
                </div>
            </div>
        </nav>
    </div>
@endif
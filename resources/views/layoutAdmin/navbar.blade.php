<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading"></div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Pusat Informasi 
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseDashboards" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link" href="{{ route('region.index') }}">
                                Data Desa
                            </a>
                            <a class="nav-link" href="{{ route('spasial') }}">
                                Daftar Spasial Desa
                            </a>
                            <a class="nav-link" href="{{ route('vaccine.index') }}">
                                Data Stok Vaksin
                            </a>
                        </nav>
                    </div>
                    <div class="sidenav-menu-heading"></div>
                    <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Kegiatan Vaksinasi
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapsePages" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link" href="{{ route('posko.index') }}">
                                Daftar Posko Vaksinasi
                            </a>
                            <a class="nav-link" href="{{ route('event.index') }}">
                                Data Kegiatan Vaksinasi
                            </a>
                        </nav>
                    </div>
                    <div class="sidenav-menu-heading"></div>
                    <a class="nav-link" href="charts.html">
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
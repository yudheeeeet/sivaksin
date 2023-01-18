<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sidenav shadow-right sidenav-light">
            <div class="sidenav-menu">
                <div class="nav accordion" id="accordionSidenav">
                    <div class="sidenav-menu-heading"></div>
                    <a class="nav-link {{ Request::segment(2) == 'region' || Request::segment(2) == 'spasial' || Request::segment(2) == 'vaccine' ? 'collapsed' : '' }}" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="{{ Request::segment(2) == 'region' || Request::segment(2) == 'spasial' || Request::segment(2) == 'vaccine' ? 'true' : 'false' }}" aria-controls="collapseDashboards">
                        <div class="nav-link-icon"><i data-feather="activity"></i></div>
                        Pusat Informasi
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collaps {{ Request::segment(2) == 'region' || Request::segment(2) == 'spasial' || Request::segment(2) == 'vaccine' || Request::segment(2) == 'latlng' ? 'active show' : '' }}" id="collapseDashboards" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                            <a class="nav-link {{ Request::segment(2) == 'spasial' ? 'active' : '' }}" href="{{ route('admin') }}">
                                Hasil Pemetaan Vaksinasi
                            </a>
                            <a class="nav-link {{ Request::segment(2) == 'region' ? 'active' : '' }}" href="{{ route('region.index') }}">
                                Data Desa
                            </a>
                            <a class="nav-link {{ Request::segment(2) == 'vaccine' ? 'active' : '' }}" href="{{ route('vaccine.index') }}">
                                Data Stok Vaksin
                            </a>
                            <a class="nav-link {{ Request::segment(2) == 'latlng' ? 'active' : '' }}" href="{{ route('latlng') }}">
                                Cara Menentukan Lat dan Lng
                            </a>
                        </nav>
                    </div>
                    <div class="sidenav-menu-heading"></div>
                    <a class="nav-link {{ Request::segment(2) == 'posko' ||  Request::segment(2) == 'event'? 'collapsed' : '' }} " href="javascript:void(0);" data-toggle="collapse" data-target="#collapsePages" aria-expanded=" {{ Request::segment(2) == 'posko' ||  Request::segment(2) == 'event'? 'true' : 'false' }}" aria-controls="collapsePages">
                        <div class="nav-link-icon"><i data-feather="grid"></i></div>
                        Kegiatan Vaksinasi
                        <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Request::segment(2) == 'posko' ||  Request::segment(2) == 'event'? 'active show' : '' }}" id="collapsePages" data-parent="#accordionSidenav">
                        <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">
                            <a class="nav-link  {{ Request::segment(2) == 'posko' ? 'active' : '' }}" href="{{ route('posko.index') }}">
                                Daftar Posko Vaksinasi
                            </a>
                            <a class="nav-link  {{ Request::segment(2) == 'event' ? 'active' : '' }}" href="{{ route('event.index') }}">
                                Data Kegiatan Vaksinasi
                            </a>
                            
                        </nav>
                    </div>
                    <div class="sidenav-menu-heading"></div>
                    <a class="nav-link" href="{{ url('/admin/report') }}">
                        <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                        Grafik Pelaksanaan Vaksinasi
                    </a>
                </div>
            </div>

            <div class="sidenav-footer">
                <div class="sidenav-footer-content">
                    <div class="sidenav-footer-subtitle">Logged in as:</div>
                    <div class="sidenav-footer-title">Koordinator Pelaksana Vaksinasi Covid-19 Regional Semboro</div>
                </div>
            </div>
        </nav>
    </div>

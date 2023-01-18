@extends('layouts.master')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </h1>
                            <div class="page-header-subtitle">Sistem Pendataan Warga Tervaksinasi Covid-19 Kecamatan Semboro</div>
                        </div>
                        <div class="col-12 col-xl-auto mt-4">
                            <button class="btn btn-white p-3" id="reportrange">
                                <i class="mr-2 text-primary" data-feather="calendar"></i>
                                <span></span>
                                <i class="ml-1" data-feather="chevron-down"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container mt-n10">
            <div class="row">
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-xxl-12">
                                    <div class="text-center text-xl-left text-xxl-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                        <h1 class="text-primary">Mapping Warga Tervaksinasi</h1>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="{{ asset('asset/assets/img/freepik/logo-pemkab-jember.png') }}" style="max-width: 15rem" /></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-12 col-xl-12 mb-4">
                    <div class="card card-header-actions h-100">
                        <div class="card-header">
                            Map Pendataan
                            <div class="dropdown no-caret">
                                <button class="btn btn-transparent-dark btn-icon dropdown-toggle" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="text-gray-500" data-feather="more-vertical"></i></button>
                                <div class="dropdown-menu dropdown-menu-right animated--fade-in-up" aria-labelledby="dropdownMenuButton">
                                    <h6 class="dropdown-header">Filter Activity:</h6>
                                    <a class="dropdown-item" href="#!"><span class="badge badge-green-soft text-green my-1">Commerce</span></a>
                                    <a class="dropdown-item" href="#!"><span class="badge badge-blue-soft text-blue my-1">Reporting</span></a>
                                    <a class="dropdown-item" href="#!"><span class="badge badge-yellow-soft text-yellow my-1">Server</span></a>
                                    <a class="dropdown-item" href="#!"><span class="badge badge-purple-soft text-purple my-1">Users</span></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            
                            <div id="mapid" style ='height:600px'>
                                <script>
                                var mymap = L.map('mapid').setView([-8.1949236,113.4385843], 13);
                                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoieXVkaGVlZWV0IiwiYSI6ImNrc2lremkzdjB0ZXkyb21iZDgwaWkyem0ifQ.zCNKGntSUcbbbojsPIjJ6g', {
                                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                    maxZoom: 18,
                                    id: 'mapbox/streets-v11',
                                    tileSize: 512,
                                    zoomOffset: -1,
                                    accessToken: 'pk.eyJ1IjoieXVkaGVlZWV0IiwiYSI6ImNrc2lremkzdjB0ZXkyb21iZDgwaWkyem0ifQ.zCNKGntSUcbbbojsPIjJ6g'
                                }).addTo(mymap);

                                </script>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="footer mt-auto footer-light">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 small">Copyright &copy; Your Website 2020</div>
                <div class="col-md-6 text-md-right small">
                    <a href="#!">Privacy Policy</a>
                    &middot;
                    <a href="#!">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection
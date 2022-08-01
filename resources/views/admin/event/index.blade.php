@extends('layoutAdmin.master')
@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                <div class="container">
                    <div class="page-header-content pt-4">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto mt-4">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><i data-feather="filter"></i></div>
                                    Daftar Jadwal Kegiatan Vaksinasi kawasan Kecamatan Semboro
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container mt-n10">
                @foreach ($event as $item)
                <div class="card mb-4">
                    <div class="card-header"></div>
                    <div class="card">
                        <h5 class="card-header">{{ $item->posko->nama_posko }}</h5>
                        <div class="card-body">
                            <h6 class="card-title">Alamat: {{ $item->posko->alamat }}</h6>
                            <br>
                            <p class="card-text">Petugas: {{ $item->petugas }}</p>
                            <p class="card-text">{{ date('Y-m-d, H:i:s', strtotime($item->tanggal_kegiatan))}} s/d selesai</p>
                            <p class="card-text">Status: {{ $item->status }}</p>
                            <p class="card-text">Deskripsi: {{ $item->deskripsi }}</p>
                            <a href="{{ route('results.create') }}" class="btn btn-success">Lihat Hasil Kegiatan</a> <a href="{{ route('results.show', $item->id) }}" class="btn btn-primary">Kelola Hasil Kegiatan</a> <a href="#" class="btn btn-warning">Ubah Jadwal</a> 
                        </div>
                    </div>
                </div>
                @endforeach
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
    </div>
    
    @endsection
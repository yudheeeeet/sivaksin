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
                                    Tabel Data Stok Vaksinasi Covid-19 Regional Kecamatan Semboro
                                </h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Main page content-->
            <div class="container mt-n10">
                <div class="card mb-4">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <div class="datatable">
                            <table class="table table-bordered table-hover" id="dataTable" width="1080px" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kategori Vaksin</th>
                                        <th>Jenis Vaksin</th>
                                        <th>Stock</th>
                                        <th>Tanggal Ditambahkan</th>
                                        <th>Tanggal Pembaharuan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($vaccine as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kategori }}</td>
                                    <td>{{ $item->jenis_vaksin }}</td>
                                    <td>{{ $item->stock }}</td>
                                    <td>{{ $item->created_at->format('Y-M-d H:i:s') }}</td>
                                    <td>{{ $item->updated_at->format('Y-M-d H:i:s') }}</td>
                                    <td>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark mr-2" href="{{ url('/admin/vaccine'. '/'. $item->id. '/edit') }}"><i data-feather="edit-2"></i></a>
                                        <a class="btn btn-datatable btn-icon btn-transparent-dark" href=""><i data-feather="trash-2"></i></a>
                                    </td>
                                </tr>
                                @endforeach    
                                </tbody>
                            </table>
                            <a class="btn btn-primary btn-sm" href="{{ route('vaccine.create') }}">
                                <i class="mr-1" data-feather="external-link"></i>
                                Tambah
                            </a>
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
    </div>
    
    @endsection
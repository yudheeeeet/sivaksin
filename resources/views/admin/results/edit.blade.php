@extends('layoutAdmin.master')
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
                                    Detail Data Kegiatan
                                </h1>
                                <div class="page-header-subtitle">Sistem Informasi Geografis Wilayah Tervaksinasi Covid-19
                                    Kecamatan Semboro</div>
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
                            <div class="card-header d-flex justify-content-between">
                                <h3>Detail Event {{$event->posko->nama_posko}}</h3>
                                @if ($event->status == 'selesai')
                                    <button class="btn btn-sm btn-success">Selesai</button>
                                @elseif ($event->status == 'berlangsung')
                                    <button class="btn btn-sm btn-warning">Berlangsung</button>
                                @else
                                    <button class="btn btn-sm btn-info">Belum Mulai</button>
                                @endif
                            </div>
                            <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                                <div class="row">
                                    <div class=" col-xxl-12">
                                        <div class="text-center text-xl-left text-xxl-center px-4 mb-4 mb-xl-0 mb-xxl-4">

                                            <div>
                                                <fieldset class="border p-2 mb-2">
                                                    <legend class="w-auto px-2">Data Event</legend>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <label for="">Nama Posko</label>
                                                            <h6>{{ $event->posko->nama_posko }}</h6>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Tanggal Kegiatan</label>
                                                            <h6>{{ $event->tanggal_kegiatan }}</h6>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Petugas</label>
                                                            <h6>{{ $event->petugas }}</h6>
                                                        </div>

                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-md-12">
                                                            <label for="">Deskripsi</label>
                                                            <h6>{{ $event->deskripsi }}</h6>
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                <fieldset class="border p-2 mt-3">
                                                    <legend class="w-auto px-2">Data Dosis Vaksin</legend>
                                                    <div class="row p-3">

                                                        <table class="table table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th>Jenis Vaksin</th>
                                                                    <th>Jumlah Tersedia</th>
                                                                    <th>Jumlah Digunakan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($result as $item)
                                                                    <tr>
                                                                        <td>{{ $item->jenis_vaksin }}</td>
                                                                        <td>{{ $item->stock_available }}</td>
                                                                        <td>{{ $item->stock_used }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </fieldset>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <div class="input-group-append">
                                                        <a href="{{ route('event.index') }}"
                                                            class="btn btn-primary">Kembali</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="assets/img/freepik/at-work-pana.svg" style="max-width: 26rem" /></div> --}}
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

{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.764355136763!2d113.7059314744829!3d-8.17302042429141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6942e46a0c85d%3A0x7c04a93089d3ca57!2sJl.%20Sumatra%2C%20Tegal%20Boto%20Lor%2C%20Sumbersari%2C%20Kec.%20Sumbersari%2C%20Kabupaten%20Jember%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1629877404256!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}

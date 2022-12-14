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
                                Tambah Data Kegiatan
                            </h1>
                            <div class="page-header-subtitle">Sistem Informasi Geografis Wilayah Tervaksinasi Covid-19 Kecamatan Semboro</div>
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
                            <div class="row">
                                <div class=" col-xxl-12">
                                    <div class="text-center text-xl-left text-xxl-center px-4 mb-4 mb-xl-0 mb-xxl-4">
                                        @if ($errors->any())
                                        <div class="alert alert-warning">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{$error}}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @elseif(session('berhasil'))
                                        <div class="alert alert-success">
                                            <ul>
                                                <li>{{ session('berhasil') }}</li>
                                            </ul>
                                        </div>
                                        @endif
                                        <div>
                                            <form method="POST" action="{{ route('results.store') }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div id="inputFormRow">
                                                            <div class="mb-3" >
                                                                <label></label>
                                                                <input class="form-control" type="hidden" name="event_id" value="{{ $event->id }}">
                                                            </div>
                                                            <div class="mb-3" >
                                                                <label>Nama Posko</label>
                                                                <input class="form-control" type="text" value="{{ $event->posko->nama_posko }}">
                                                            </div>
                                                           @foreach ($result as $rs)
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <label for="">Jenis Vaksin</label>
                                                                    <input type="text" readonly name="" class="form-control" value="{{$rs->jenis_vaksin}}" id="">
                                                                    <input type="hidden" readonly name="id_vaksin[]" class="form-control" value="{{$rs->id}}" id="">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Stok Digunakan</label>
                                                                    <input type="number" name="stock_used[]" class="form-control" id="">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Stok Dibawa</label>
                                                                    <input type="number" readonly name="" class="form-control" value="{{$rs->stock_available}}" id="">
                                                                </div>
                                                            </div>
                                                           @endforeach
                                                            {{-- <div class="input-group mb-3">
                                                                <input type="text" name="stock_used" class="form-control m-input" placeholder="Masyarakat Tervaksinasi" autocomplete="off">
                                                            </div> --}}
                                                          
                                                            <br>
                                                            {{-- <div class="input-group-append">
                                                                <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                                                            </div> --}}
                                                        </div>
                                                        {{-- <div id="newRow"></div>
                                                        <div class="d-flex justify-content-between mb-3">
                                                            <div></div>
                                                            <button id="addRow" type="button" class="btn btn-info">Add Row</button>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-between">
                                                    <div class="input-group-append">
                                                        <a href="{{ route('event.index') }}" class="btn btn-primary">Kembali</a>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                                </div>
                                            </form>
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
        @section('script')
        <script type="text/javascript">
            // add row
            $("#addRow").click(function () {
                var html = '';
                html += '<div id="inputFormRow">';
                    html += '<form method="POST" action="{{ route('results.store') }}">';
                        html += '@csrf';
                        html += '<div class="row">';
                        html += '<div class="mb-3" >';
                            html += '<label></label>';
                            html += '<input class="form-control" type="hidden" name="event_id" value="{{ $event->id }}">';
                            html += '</div>';
                            html += '<div class="form-group">';
                                html += '<label for="exampleFormControlSelect1">Pilih Kategori Vaksin</label>';
                                html += '<select class="form-control" id="exampleFormControlSelect1" name="vaccine_id">';
                                    html += '@foreach ($vaccine as $item)'
                                    html +=  '<option value="{{ $item->id }}">{{ $item->jenis_vaksin }}</option>'
                                    html +=  '@endforeach';
                                    html += '</select>';
                                    html += '</div>';
                                    html += '<div class="input-group mb-3">';
                                        html += '<input type="text" name="title[]" class="form-control m-input" placeholder="Masyarakat Tervaksinasi" autocomplete="off">';
                                        html += '</div>';
                                        html += '<div class="input-group-append">';
                                            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
                                            html += '</div>';
                                            html +='</form>';

                                            $('#newRow').append(html);
                                        });

                                        // remove row
                                        $(document).on('click', '#removeRow', function () {
                                            $(this).closest('#inputFormRow').remove();
                                        });
                                    </script>
                                    @endsection
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

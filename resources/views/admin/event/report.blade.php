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
                                    Grafik Pelaksanaan Vaksinasi Kecamatan Semboro
                                </h1>

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
                        <div class="card">
                            <div class="card-body h-100 d-flex flex-column justify-content-center py-5 py-xl-4">
                                <div class="row ">
                                    <div class="col-md-12">
                                        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                                    </div>
                                    {{-- <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid" src="assets/img/freepik/at-work-pana.svg" style="max-width: 26rem" /></div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @section('script')
            <script>
                $(document).ready(function() {
                    $("#addRow").click(function() {
                        $("#inputFormRow").clone().appendTo("#newRow");
                    });
                });
            </script>
            <script>
                var xValues = [];
                var yValues = [];
                @foreach ($data as $dt)
                    yValues.push("{{ $dt->total }}");
                    xValues.push('{{ $dt->nama_posko }}');
                @endforeach
                console.log(yValues);
                var barColors = "blue";

                new Chart("myChart", {
                    type: "bar",
                    data: {
                        labels: xValues,
                        datasets: [{
                            backgroundColor: barColors,
                            data: yValues,
                            minBarLength: 5
                        }]
                    },
                    options: {
                        legend: {
                            display: false
                        },
                        title: {
                            display: true,
                            text: "Grafik Pelaksanaan Vaksinasi Kecamatan Semboro"
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            </script>
        </main>
    @endsection

</div>

@endsection

{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.764355136763!2d113.7059314744829!3d-8.17302042429141!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6942e46a0c85d%3A0x7c04a93089d3ca57!2sJl.%20Sumatra%2C%20Tegal%20Boto%20Lor%2C%20Sumbersari%2C%20Kec.%20Sumbersari%2C%20Kabupaten%20Jember%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1629877404256!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe> --}}

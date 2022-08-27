@extends('layouts.master')
@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="card card-icon mb-4" style="width: 1080px">
                <div class="row no-gutters">
                    <div class="col">
                        <div class="card-body py-5">
                            <h5 class="card-title">Hasil Pemetaan Wilayah</h5>
                            {{-- <p class="card-text">DataTables is a third party plugin that is used to generate the demo table above. 
                                For more information about how to use DataTables with your project, please visit the official DataTables documentation.</p> --}}
                                <div class="card-body">
                                    
                                    <div id="mapid" style ='height:600px; width: 1000px'>
                                        <script>
                                            var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoieXVkaGVlZWV0IiwiYSI6ImNrc2lremkzdjB0ZXkyb21iZDgwaWkyem0ifQ.zCNKGntSUcbbbojsPIjJ6g', {
                                                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                                                maxZoom: 15,
                                                id: 'mapbox/streets-v11',
                                                tileSize: 512,
                                                zoomOffset: -1,
                                                accessToken: 'pk.eyJ1IjoieXVkaGVlZWV0IiwiYSI6ImNrc2lremkzdjB0ZXkyb21iZDgwaWkyem0ifQ.zCNKGntSUcbbbojsPIjJ6g'
                                            });
                                            var vector_layer = L.layerGroup();
                                            @foreach($region as $item)
                                            @foreach ($item->posko as $posko)
                                            L.marker([{{$posko['latitude']}} , {{$posko['longitude']}}])
                                                .bindPopup(
                                                '<b class="text-sm">{{$posko['nama_posko']}} <br> <a href="{{url('/detail', $item->id)}}" class="btn btn-primary btn-sm text-white">Detail</a>')
                                                    .addTo(vector_layer)
                                                    ;
                                            @endforeach
                                            L.geoJSON({!! $item['geojson'] !!} 
                                            ,{
                                                style: {
                                                    color: '#000',
                                                    fillColor: '#ff7800',
                                                    fillOpacity: 1.0,
                                                    weight: 1,
                                                }})
                                                .addTo(vector_layer).bindTooltip('{{ $item['nama_desa'] }}');
                                                
                                                @endforeach
                                                var map = L.map('mapid', {
                                                    center: [-8.1949236,113.4385843],
                                                    zoom: 12,
                                                    layers: [peta1, vector_layer],
                                                });
                                                
                                                var baseMaps = {
                                                    "Map": peta1,
                                                };
                                                L.control.layers(baseMaps).addTo(map);
                                            </script>
                                        </div>
                                    </div>
                                    
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
</div>

@endsection
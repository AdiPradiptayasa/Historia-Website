<x-user-layout>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        #map {
            height: 50vh; /* 50% dari tinggi viewport */
            width: 100%;
        }
       
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Arial', sans-serif;
        }

        .leaflet-container {
            height: 400px; /* 70% dari tinggi viewport */
            width: 100%;
            max-width: 100%;
            max-height: 100%;
        }

        .container {
            margin-top: 20px;
        }

        .card {
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        .card-header {
            background-color: #3498db;
            color: #fff;
            padding: 15px;
            border-bottom: 1px solid #eee;
            border-radius: 10px 10px 0 0;
        }

        .card-body {
            padding: 20px;
        }

        h4, h5 {
            color: #3498db;
        }

        img.img-fluid {
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .leaflet-control-layers {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Map Spot</div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6    ">
                <div class="card">
                    <div class="card-header">Detail Spot : {{ $spot->name }}</div>
                    <div class="card-body">
                        <p>
                            <h4 class="mt-4 font-bold text-2xl"><strong>Nama Spot :</strong></h4>
                            <h5 class="mb-4"> {{ $spot->name }}</h5>
                        </p>

                        <p>
                            <h4 class="mt-4 font-bold text-2xl"><strong>Detail :</strong></h4>
                            <p class="mb-4">{{ $spot->description }}</p>
                        </p>

                        <p>
                            <h4 class="font-bold text-2xl"><strong>Gambar</strong></h4>
                            <img class="img-fluid" width="200" src="{{ $spot->getImageAsset() }}" alt="">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.js"></script>

    <script>
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var Stadia_Dark = L.tileLayer(
            'https://tiles.stadiamaps.com/tiles/alidade_smooth_dark/{z}/{x}/{y}{r}.png', {
                maxZoom: 20,
                attribution: '&copy; <a href="https://stadiamaps.com/">Stadia Maps</a>, &copy; <a href="https://openmaptiles.org/">OpenMapTiles</a> &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
            });

        var Esri_WorldStreetMap = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
            });

        var map = L.map('map', {
            center: [{{ $spot->coordinates }}],
            zoom: 10,
            layers: [osm],
            fullscreenControl: {
                pseudoFullscreen: false
            }
        })

        const baseLayers = {
            'Openstreetmap': osm,
            'StadiaDark': Stadia_Dark,
            'Esri': Esri_WorldStreetMap
        }

        const layerControl = L.control.layers(baseLayers).addTo(map)
        var curLocation = [{{ $spot->coordinates }}]

        var marker = new L.marker(curLocation, {
            draggable: false
        })
        map.addLayer(marker)
    </script>

</x-user-layout>

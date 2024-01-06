<x-dashboard-layout>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

    <style>
        #map {
            height: 400px;
            width: 1220px;
        }

        /* Atur jarak di bagian atas dan bawah kartu */
        .card {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        /* Atur jarak di bagian atas dan bawah container */
        .container {
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                center: [-5.129541583080711, 113.62957770241515],
                zoom: 5,
                layers: [osm]
            });

            var iconMarker = L.icon({
                iconUrl: '{{ asset('iconMarkers/marker.png') }}',
                iconSize: [50, 50],
            });

            var marker = L.marker([-8.671490848963218, 115.23385907953397], {
                icon: iconMarker,
                draggable: false
            })
                .bindPopup('Bajra Sandhi Monument')
                .addTo(map);

            var baseMaps = {
                'Open Street Map': osm,
                'Esri World': Esri_WorldStreetMap,
                'Stadia Dark': Stadia_Dark
            };

            var overlayers = {
                'Marker': marker,
            };

            L.control.layers(baseMaps, overlayers).addTo(map);

            


            function onEachFeature(feature, layer) {
                let popupContent = `Data Geojson  ${feature.geometry.type}  `;

                if (feature.properties && feature.properties.popupContent) {
                    popupContent += feature.properties.popupContent;
                }

                layer.bindPopup(popupContent);
            }

            const geoJson = L.geoJSON(hospital, {
                style(feature) {
                    return feature.properties && feature.properties.style;
                },
                onEachFeature,
            }).addTo(map);
        });
    </script>

</x-dashboard-layout>

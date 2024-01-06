<x-admin-layout>

<!--Script-->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
   <style>
        #map {
            height: 400px;
        }
    </style>
<!--Script-->

<!--Content-->
  <div class="container">
        <div class="row justify-content-center">
            <!-- Kolom Map -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Add Centre Point</div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>

            <!-- Kolom Form Titik Koordinat -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Titik Koordinat</div>
                    <br>
                    <div class="card-body">
                        <form action="{{ route('centre-point.store') }}" method="post">
                            @csrf
                            <div class="sm:col-span-3">
                                    <label for="coordinate" class="block text-sm font-medium leading-6 text-gray-900">Koordinat</label>
                                    <div class="mt-2">
                                       <input type="text" name="coordinate" id="coordinate" autocomplete="given-name"                                          
                                 class="form-control @error('coordinate') is-invalid @enderror block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                                @error('coordinate')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>

                            
                            <div class="sm:col-span-3">
                                    <label for="latitude" class="block text-sm font-medium leading-6 text-gray-900">Latitude</label>
                                    <div class="mt-2">
                                        <input type="text" name="latitude" id="latitude" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                                <div class="sm:col-span-3">
                                    <label for="longitude" class="block text-sm font-medium leading-6 text-gray-900">Longitude</label>
                                    <div class="mt-2">
                                        <input type="text" name="longitude" id="longitude" autocomplete="given-name"
                                            class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6">
                                    </div>
                                </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm my-2">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--Content-->

    <!--JavaScript-->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
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
            center: [-5.129541583080711, 113.62957770241515],
            zoom: 5,
            layers: [osm]
        })


        var marker = L.marker([-5.129541583080711, 113.62957770241515], {
            draggable: true
        }).addTo(map);

        var baseMaps = {
            'Open Street Map': osm,
            'Esri World': Esri_WorldStreetMap,
            'Stadia Dark': Stadia_Dark
        }

        L.control.layers(baseMaps).addTo(map)

        // CARA PERTAMA
        function onMapClick(e) {
            var coords = document.querySelector("[name=coordinate]")
            var latitude = document.querySelector("[name=latitude]")
            var longitude = document.querySelector("[name=longitude]")
            var lat = e.latlng.lat
            var lng = e.latlng.lng

            if (!marker) {
                marker = L.marker(e.latlng).addTo(map)
            } else {
                marker.setLatLng(e.latlng)
            }

            coords.value = lat + "," + lng
            latitude.value = lat,
                longitude.value = lng
        }
        map.on('click', onMapClick)
        // CARA PERTAMA

        // CARA KEDUA
        marker.on('dragend', function() {
            var coordinate = marker.getLatLng();
            marker.setLatLng(coordinate, {
                draggable: true
            })
            $('#coordinate').val(coordinate.lat + "," + coordinate.lng).keyup()
            $('#latitude').val(coordinate.lat).keyup()
            $('#longitude').val(coordinate.lng).keyup()
        })
        // CARA KEDUA
 
    </script>
    <!--JavaScript-->

</x-admin-layout>
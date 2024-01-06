<x-admin-layout>

    <!-- Style -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">

    <style>
        /* Style tambahan untuk table */
        .table th,
        .table td {
            border: 1px solid #e2e8f0;
            padding: 8px; /* Tambahkan padding untuk memberikan ruang */
            text-align: center; /* Pusatkan teks di sel tabel */
        }
    
        .table th {
            background-color: #f8fafc;
        }
    
        /* Tambahkan class untuk menyesuaikan lebar tabel */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
    
        
        .img-preview {
            max-width: 100px;
            height: auto;
            display: block; 
            margin: 0 auto; 
        }

    
        /* Tambahkan border pada input pencarian */
        #search {
            border: 2px solid #e2e8f0;
            padding: 6px;
            margin-right: 8px;
        }
    
        /* Pusatkan teks pada kolom tabel */
        #dataSpot th,
        #dataSpot td {
            text-align: center;
        }
    </style>
    

    <!-- End Style -->

    <!-- Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="font-quicksand pt-5 font-bold text-2xl mb-4">
                            List Spot
                        </div>
                        
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif

                        <div class="mb-3 title_right flex justify-end">
                            <!-- Input untuk Pencarian dan Show Entries -->
                            <label for="search" class="mr-2">Search:</label>
                            <input type="search" id="search">

                            <label for="entries" class="mx-2">Show entries:</label>
                            <select id="entries" class="border p-1">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <a href="{{ route('spot.create') }}" class="px-10 py-2  mb-4 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark">Tambah</a>
                        <table class="table table-responsive" id="dataSpot">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Spot</th>
                                    <th>Image Preview</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                        <form action="" method="POST" id="deleteForm">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Hapus" style="display:none">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- JavaScript -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(function() {
            var dataTable = $('#dataSpot').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                lengthChange: false,
                autoWidth: false,
                ajax: {
                    url: '{{ route('spot.data') }}',
                    data: function (d) {
                        d.length = $('#entries').val();
                    }
                },
                columns: [
                    { data: 'DT_RowIndex', orderable: false },
                    { data: 'name' },
                    {
                        data: 'image',
                        render: function (data, type, full, meta) {
                            // Cek apakah data sudah berupa URL lengkap
                            if (data && data.startsWith('http')) {
                                return '<img src="' + data + '" alt="Image Preview" class="img-preview">';
                            } else {
                                // Jika belum, tambahkan base URL atau path yang diperlukan
                                return '<img src="{{ asset('/upload/spots/') }}/' + data + '" alt="Image Preview" class="img-preview">';
                            }
                        }
                    },
                    { data: 'action' }
                ]
            });
    
            $('#search, #entries').on('input change', function () {
                dataTable.search($('#search').val()).draw();
            });
        })

    </script>
    
    <!-- End Javascript -->

</x-admin-layout>

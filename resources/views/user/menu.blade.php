<x-kontribusi-layout>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">

    <!-- DataTables JS -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>

    <section class="pb-20 pt-5">
        <div class="text-left ml-2 mt-0">
            <div class="font-quicksand font-bold text-2xl mb-4">
                Daftar Sejarah
            </div>
        </div>
        
        
        <div class="title_right flex justify-end">
            <!-- Search Form -->
            <form action="{{ route('kontribusi.index') }}" method="GET" class="flex pb-3 place-items-center">
                <!-- Kategori Dropdown -->
                <select name="kategori_id" id="kategori_id" class="mt-1 p-2 w-1/3 border rounded-md mr-2">
                    <option value="">Pilih Kategori</option>
                    @foreach ($Kategori as $item)
                        <option value="{{ $item->kategori_id }}" {{ (isset($_GET['kategori_id']) && $_GET['kategori_id'] == $item->kategori_id) ? 'selected' : '' }}>
                            {{ $item->kategori_name }}
                        </option>
                    @endforeach
                </select>
                <!-- Search Input -->
                <input type="text" name="s" value="{{ isset($_GET['s']) ? $_GET['s'] : '' }}" class="mt-1 p-2 w-1/3 border rounded-md mr-2">
                <!-- Submit Button -->
                <button type="submit" class="bg-gradient-to-tl from-purple-700 to-pink-500 text-black font-bold py-1 px-4 rounded-xl">Cari</button>
            </form>
        </div>

        <!-- Table -->
        <div class="p-2 rounded-lg w-full">
            <!-- Tambah Button -->
            <a href="{{ route('kontribusi.create') }}" class="px-4 py-2 text-sm text-white rounded-md bg-primary hover:bg-primary-dark focus:outline-none focus:ring focus:ring-primary focus:ring-offset-1 focus:ring-offset-white dark:focus:ring-offset-dark mb-10">Tambah</a>

            <!-- Table Responsive -->
            <div class="table-responsive mt-4">
                <table id="historyTable" class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border border-gray-200 px-4 py-2">Nama Sejarah</th>
                            <th class="border border-gray-200 px-4 py-2">Sub Judul Sejarah</th>
                            <th class="border border-gray-200 px-4 py-2">Deskripsi Sejarah</th>
                            <th class="border border-gray-200 px-4 py-2">Foto Sejarah</th>
                            <th class="border border-gray-200 px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($Kontribusi as $key => $item)
                            <tr>
                                <td class="border border-gray-200 px-4 py-2">{{ $item->sejarah_nama }}</td>
                                <td class="border border-gray-200 px-4 py-2">{{ $item->sejarah_subjudul }}</td>
                                <td class="border border-gray-200 px-4 py-2">{!! Str::limit($item->sejarah_desc, 100) !!}</td>
                                <td class="border border-gray-200 px-4 py-2">
                                    <div style="max-width: 100px; max-height: 100px; overflow: hidden;">
                                        <img src="{{ asset($item->sejarah_img) }}" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </td>
                                <td class="border border-gray-200 px-4 py-2">
                                    <a href="{{ route('kontribusi.edit', $item->sejarah_id) }}" class="fa fa-pencil">Edit</a>
                                    <form action="{{ route('kontribusi.destroy', $item->sejarah_id) }}" method="POST" id="deleteForm-{{ $item->sejarah_id }}">
                                        @CSRF @METHOD('DELETE')
                                        <button class="fa fa-trash delete-btn" data-id="{{ $item->sejarah_id }}" type="button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </section>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Gunakan kelas delete-btn untuk memilih semua tombol delete
        document.addEventListener('DOMContentLoaded', function () {
            const deleteButtons = document.querySelectorAll('.delete-btn');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const itemId = this.getAttribute('data-id');
                    showDeleteConfirmation(itemId);
                });
            });
        });

        function showDeleteConfirmation(itemId) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Kamu tidak bisa mengembalikan nya lagi!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Gunakan id unik untuk memilih formulir delete yang benar
                    const form = document.getElementById(`deleteForm-${itemId}`);
                    if (form) {
                        form.submit();
                    }

                    Swal.fire(
                        'Deleted!',
                        'Data kamu berhasil di Hapus .',
                        'success'
                    );
                }
            });
        }
    </script>
</x-kontribusi-layout>

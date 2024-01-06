<x-dashboard-layout>
    <div class="title_left flex justify-between mx-8 pt-4">
        <!-- Search Form -->
        <form action="{{'/kategori'}}" method="GET" class="flex pb-3 place-items-center" id="kategoriForm">
            <!-- Kategori Dropdown -->
            <select name="kategori_id" id="kategori_id" class="mt-1 p-2 w-1/3 border rounded-md mr-2" onchange="submitForm()">
                <option value="">Pilih Kategori</option>
                @foreach ($Kategori as $item)
                    <option value="{{ $item->kategori_id }}" {{ request('kategori_id') == $item->kategori_id ? 'selected' : '' }}>
                        {{ $item->kategori_name }}
                    </option>
                @endforeach
            </select>
            <!-- Search Input -->
            <input type="text" name="s" value="{{ request('s') }}" class="mt-1 p-2 w-1/3 border rounded-md mr-2" id="searchInput">
            <!-- Submit Button -->
            <button type="submit" class="bg-blue-500 font-md text-white py-1 px-4 rounded-xl">Cari</button>
        </form>
    </div>
    <div class="w-full px-4 flex flex-wrap">
        @foreach ($History as $key => $item)
            <div class="mb-12 p-3 md:w-1/3">
                <div class="bg-white rounded-xl shadow-lg duration-500 hover:scale-105 hover:shadow-md overflow-hidden mb-10">
                    <a href="{{ route('detail', $item->slug) }}">
                            <img src="{{ asset($item->sjrh_img) }}" alt="" class="w-full">
                    </a>
                    <div class="py-10 px-8">
                        <h3>
                            <a href="{{ route('detail', $item->slug) }}" class="font-bold text-2xl text-dark hover:text-blue-500">{{ $item->sjrh_nama }}</a>
                        </h3>
                        <p class="font-small text-base text-slate-500 mb-4">{{ $item->sjrh_subjudul }}</p>
                        <a href="{{ route('detail', $item->slug) }}" class="font-medium text-dark border-b rounded-lg hover:text-blue-500 hover:opacity-60">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="w-full px-4 flex flex-wrap">
        @foreach ($Kontribusi as $key => $item)
            <div class="mb-12 p-3 md:w-1/3">
                <div class="bg-white rounded-xl shadow-lg duration-500 hover:scale-105 hover:shadow-md overflow-hidden mb-10">
                    <a href="{{ route('detailUser', $item->slug) }}">
                            <img src="{{ asset($item->sejarah_img) }}" alt="" class="w-full">
                    </a>
                    <div class="py-10 px-8">
                        <h3>
                            <a href="{{ route('detailUser', $item->slug) }}" class="font-bold text-2xl text-dark hover:text-blue-500">{{ $item->sejarah_nama }}</a>
                        </h3>
                        <p class="font-small text-base text-slate-500 mb-4">{{ $item->sejarah_subjudul }}</p>
                        <a href="{{ route('detailUser', $item->slug) }}" class="font-medium text-dark border-b rounded-lg hover:text-blue-500 hover:opacity-60">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <script>
        document.getElementById('kategori_id').addEventListener('change', function () {
        // Mengirim formulir secara otomatis saat dropdown kategori diubah
        document.getElementById("kategoriForm").submit();
        });

        document.getElementById('searchInput').addEventListener('input', function () {
        // Mengirim formulir secara otomatis saat pengguna mengetik
        document.getElementById("kategoriForm").submit();
        });
    </script>
</x-dashboard-layout>

<x-admin-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/decoupled-document/translations/en.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/media-embed/ckeditor.js"></script>

    <div class="flex justify-center items-center w-screen">
        <div class="max-w-screen-xl mx-auto">
            <div class="row justify-content-center">
                <form enctype="multipart/form-data"
                    action="{{ isset($History) ? route('admin.update', $History->sjrh_id) : route('admin.store') }}"
                    method="POST" id="historyForm">
                    @csrf
                    @if(isset($History)) @method('PUT') @endif

                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full mb-4">
                                <label for="sjrh_nama"
                                    class="block text-2xl font-medium leading-6 text-gray-900">Nama Sejarah</label>
                                <div class="mt-2">
                                    <input type="text" name="sjrh_nama" id="sjrh_nama"
                                        value="{{ isset($History) ? $History->sjrh_nama : old('sjrh_nama') }}"
                                        autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6">
                                    @error('sjrh_nama')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full mb-4">
                                <label for="subjudul"
                                    class="block text-2xl font-medium leading-6 text-gray-900">Subjudul</label>
                                <div class="mt-2">
                                    <input type="text" name="sjrh_subjudul" id="sjrh_subjudul"
                                        value="{{ isset($History) ? $History->sjrh_subjudul : old('sjrh_subjudul') }}"
                                        autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6">
                                    @error('subjudul')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full mb-4">
                                <label for="kategori"
                                    class="block text-2xl font-medium leading-6 text-gray-900">Kategori Sejarah</label>
                                <div class="mt-2">
                                    <select id="kategori_id" name="kategori_id" autocomplete="country-name"
                                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-xl sm:leading-6">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($Kategori as $item)
                                        <option
                                            {{ (isset($History) && $History->kategori_id == $item->kategori_id) || old('kategori_id') == $item->kategori_id ? 'selected' : '' }}
                                            value="{{ $item->kategori_id }}">{{ $item->kategori_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full mb-4">
                                <label for="sjrh_desc" class="block text-2xl font-medium leading-6 text-gray-900">Deskripsi</label>
                                <div class="mt-2">
                                    <textarea id="sjrh_desc" name="sjrh_desc" rows="3" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6" required>{!! isset($History) ? $History->sjrh_desc : old('sjrh_desc') !!}</textarea>

                                    @error('sjrh_desc')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full mb-4">
                                <label for="sjrh_img" class="font-weight-bold">Foto</label>
                                <input type="file" id="sjrh_img" name="sjrh_img" class="form-control" 
                                       {{ isset($History) ? '' : 'required' }}>
                                @if(isset($History) && $History->sjrh_img)
                                    <p class="text-success">Gambar saat ini: {{ $History->sjrh_img }}</p>
                                @endif
                                @error('sjrh_img')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mt-6 flex items-center justify-end gap-x-6">
                        <button type="button" id="cancelButton"
                            class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>

                        <button type="button" id="saveButton"
                            class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-none focus-visible:ring focus-visible:ring-indigo-600 focus-visible:ring-offset-2 focus-visible:ring-offset-gray-900">Save</button>
                    </div>
                </form>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                @if(session('success'))
                <script>
                    Swal.fire({
                        title: 'Success!',
                        text: '{{ session('success') }}',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                </script>
                 @endif

                 @if(session('error'))
                <script>
                    Swal.fire({
                        title: 'Error!',
                        text: '{{ session('error') }}',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                </script>
                @endif
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        ClassicEditor
                        .create(document.querySelector('#sjrh_desc'), {
                            ckfinder: {
                            uploadUrl: "{{ route('ckeditor.upload', ['_token' => csrf_token()]) }}",
                            },
                            // Add the mediaEmbed configuration
                            mediaEmbed: {
                            previewsInData: true,
                            },
                        })
                        .catch(error => {
                            console.error(error);
                        });
            
                        const saveButton = document.querySelector('#saveButton');
                        if (saveButton) {
                            saveButton.addEventListener('click', function () {
                                // Tambahkan logika validasi atau tindakan lainnya
                                const imgInput = document.querySelector('#sjrh_img');
                                const allowedExtensions = ['png', 'jpg'];
            
                                if (imgInput && imgInput.files) {
                                    for (let i = 0; i < imgInput.files.length; i++) {
                                        const fileName = imgInput.files[i].name;
                                        const ext = fileName.split('.').pop().toLowerCase();
            
                                        if (!allowedExtensions.includes(ext)) {
                                            Swal.fire({
                                                title: 'Error!',
                                                text: 'Please upload only PNG or JPG files.',
                                                icon: 'error',
                                                confirmButtonText: 'OK'
                                            });
                                            return; // Stop form submission
                                        }
                                    }
                                }
            
                                // Jika semua validasi berhasil, tindakan selanjutnya (misalnya, submit form)
                                document.querySelector('form').submit();
            
                                // SweetAlert untuk sukses
                                Swal.fire({
                                    title: 'Success!',
                                    text: 'Data berhasil disimpan!',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                });
                            });
                        }
                    });
                </script>
             
            </div>
        </div>
    </div>
</x-admin-layout>
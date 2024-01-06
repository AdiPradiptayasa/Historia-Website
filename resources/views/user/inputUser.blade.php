<x-kontribusi-layout>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/decoupled-document/translations/en.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/media-embed/ckeditor.js"></script>

    <div class="flex justify-center items-center w-screen">
        <div class="max-w-screen-xl mx-auto">
            <div class="row justify-content-center">
                <form enctype="multipart/form-data"
                    action="{{ isset($Kontribusi) ? route('kontribusi.update', $Kontribusi->sejarah_id) : route('kontribusi.store') }}"
                    method="POST">
                    @csrf
                    @if(isset($Kontribusi)) @method('PUT') @endif

                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="col-span-full mb-4">
                                <label for="sejarah_nama"
                                    class="block text-2xl font-medium leading-6 text-gray-900">Nama Sejarah</label>
                                <div class="mt-2">
                                    <input type="text" name="sejarah_nama" id="sejarah_nama"
                                        value="{{ isset($Kontribusi) ? $Kontribusi->sejarah_nama : old('sejarah_nama') }}"
                                        autocomplete="given-name"
                                        class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6">
                                    @error('sejarah_nama')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full mb-4">
                                <label for="subjudul"
                                    class="block text-2xl font-medium leading-6 text-gray-900">Subjudul</label>
                                <div class="mt-2">
                                    <input type="text" name="sejarah_subjudul" id="sejarah_subjudul"
                                        value="{{ isset($Kontribusi) ? $Kontribusi->sejarah_subjudul : old('sejarah_subjudul') }}"
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
                                            {{ (isset($Kontribusi) && $Kontribusi->kategori_id == $item->kategori_id) || old('kategori_id') == $item->kategori_id ? 'selected' : '' }}
                                            value="{{ $item->kategori_id }}">{{ $item->kategori_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('kategori_id')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full mb-4">
                                <label for="sejarah_desc" class="block text-2xl font-medium leading-6 text-gray-900">Deskripsi</label>
                                <div class="mt-2">
                                    <textarea id="sejarah_desc" name="sejarah_desc" rows="3" class="block w-full rounded-md border-0 py-1.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-xl sm:leading-6" required>{!! isset($Kontribusi) ? $Kontribusi->sejarah_desc : old('sejarah_desc') !!}</textarea>

                                    @error('sejarah_desc')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-span-full mb-4">
                                <label for="sejarah_img" class="font-weight-bold">Foto</label>
                                <input type="file" id="sejarah_img" name="sejarah_img" class="form-control" 
                                       {{ isset($Kontribusi) ? '' : 'required' }}>
                                @if(isset($Kontribusi) && $Kontribusi->sejarah_img)
                                    <p class="text-success">Gambar saat ini: {{ $Kontribusi->sejarah_img }}</p>
                                @endif
                                @error('sejarah_img')
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
                        .create(document.querySelector('#sejarah_desc'), {
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
                                const imgInput = document.querySelector('#sejarah_img');
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
</x-kontribusi-layout>
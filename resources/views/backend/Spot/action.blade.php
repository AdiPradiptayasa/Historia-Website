<a href="{{ route('spot.edit', $model) }}" class="btn btn-warning btn-sm">Edit</a>
<button href="{{ route('spot.destroy', $model) }}" class="btn btn-danger btn-sm" id="delete">Delete</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    // SweetAlert for delete confirmation
    $('#delete').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Yakin Hapus Data Spot Ini ?',
            text: "Kamu tidak bisa mengembalikan nya lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Assuming you have a form with id 'deleteForm'
                document.getElementById('deleteForm').action = href
                document.getElementById('deleteForm').submit()

                Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
            }
        })
    })

    // SweetAlert for edit success
    $('#editSuccess').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
    Swal.fire({
        title: 'Success!',
        text: '{{ session('editSuccess') }}',
        icon: 'success',
        confirmButtonText: 'OK'
    })
})
</script>

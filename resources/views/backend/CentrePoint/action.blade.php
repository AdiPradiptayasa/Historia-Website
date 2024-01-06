<a href="{{ route('centre-point.edit', $model) }}" class="btn btn-warning btn-sm">Edit</a>
<button href="{{ route('centre-point.destroy', $model) }}" class="btn btn-danger btn-sm" id="delete">Delete</button>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $('#delete').on('click', function(e) {
        e.preventDefault();
        var href = $(this).attr('href');
        Swal.fire({
            title: 'Yakin hapus data Point ini ?',
            text: "Kamu tidak bisa mengembalikan nya lagi!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya Hapus!'
        }).then((result) => {
            if (result.isConfirmed) {

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
@if(session('editSuccess'))
Swal.fire({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success"
});
@endif 
</script>

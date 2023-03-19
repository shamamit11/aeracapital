<script>
$(document).ready(function() {
    $('.delete-row-btn').click(function() {
        var id = $(this).data("id");
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes',
            cancelButtonText: 'No',
            reverseButtons: false
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '{{ route("admin-seo-delete")}}',
                    type: 'POST',
                    data: {
                        'id': id,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function() {
                        $("#tr" + id).remove();
                        toastr["success"]('Your data has been deleted.');
                        setTimeout(function() {
                            location.reload();
                        }, 1000);
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                toastr["error"]('Cancelled.');
            }
        })
    });
});
</script>
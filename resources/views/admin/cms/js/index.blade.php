<script>
    $(document).ready(function() {

        $('.switch-is_footer_link').change(function() {
            if ($(this).attr('data-is_footer_link-value') == 0) {
                var val = 1;
            } else {
                var val = 0;
            }
            $(this).attr("data-is_footer_link-value", val);
            var id = $(this).attr('data-id');
            $.ajax({
                url: '{{ route('admin-cms-status') }}',
                type: 'POST',
                data: {
                    'id': id,
                    'val': val,
                    'field_name': 'is_footer_link',
                    '_token': '{{ csrf_token() }}'
                },
                success: function() {
                    toastr["success"]('Data updated.');
                },
            });
        });
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
                        url: '{{ route('admin-cms-delete') }}',
                        type: 'POST',
                        data: {
                            'id': id,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function() {
                            $("#tr" + id).remove();
                            toastr["success"]('Data deleted.');
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

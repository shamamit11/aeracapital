<script>
    $(document).ready(function() {

        CKEDITOR.replace('comment', {
            height: 400,
            allowedContent : true,
            filebrowserImageBrowseUrl: '/file-manager/ckeditor'
        });

        $("#form").submit(function(e) {
            e.preventDefault();
            $('.btn-loading').prop('disabled', true)
            $('.btn-loading').html(
                '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Loading...'
            );
            CKEDITOR.instances.comment.updateElement();
            $.ajax({
                type: 'post',
                url: $('#form').attr('action'),
                data: $("#form").serialize(),
                success: function(data) {
                    $('.btn-loading').prop('disabled', false);
                    $('.btn-loading').html('Submit');
                    if (data.status_code == 201) {
                        toastr["success"](data.message);
                        window.location.href = "{{ route('admin-leads') }}";
                    }
                },
                error: function(xhr) {
                    $('.btn-loading').prop('disabled', false);
                    $('.btn-loading').html('Submit');
                    if (xhr.status == 422) {
                        var res = $.parseJSON(xhr.responseText);
                        if (res.error == 'validation') {
                            toastr["error"]('Please check required field.');
                            var messageLength = res.message.length;
                            for (var i = 0; i < messageLength; i++) {
                                for (const [key, value] of Object.entries(res.message[i])) {
                                    if (value) {
                                        $('#' + key).addClass('inputerror');
                                        $('#error_' + key).show();
                                        $('#error_' + key).text(value);
                                    }
                                }
                            }
                        }
                    }
                }
            });
        });
    });
</script>
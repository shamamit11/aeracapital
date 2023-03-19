<script>
    $(document).ready(function() {

        CKEDITOR.replace('description', {
            height: 400,
            filebrowserImageBrowseUrl: '/file-manager/ckeditor'
        });

        $('#title').on('change input', function(e) {
            var title = $(this).val();
            if (title) {
                $.ajax({
                    type: 'post',
                    url: "{{ route('admin-product-slug') }}",
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'name': title,
                        'id': $('#id').val()
                    },
                    success: function(data) {
                        if (data.status_code == 200) {
                            $("input[name='slug']").val(data.slug);
                        } else {
                            $("input[name='slug']").val();
                        }
                    }
                });
            }
        });


        $("#form").submit(function(e) {
            e.preventDefault();
            $('.btn-loading').prop('disabled', true)
            $('.btn-loading').html(
                '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> Loading...'
            );
            CKEDITOR.instances.description.updateElement();
            $.ajax({
                type: 'post',
                url: $('#form').attr('action'),
                data: $("#form").serialize(),
                success: function(data) {
                    $('.btn-loading').prop('disabled', false);
                    $('.btn-loading').html('Submit');
                    //console.log(data.status_code);
                    if (data.status_code == 201) {
                        toastr["success"](data.message);
                        window.location.href = "{{ route('admin-product') }}";
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

    $("input").change(function(e) {
        var inputId = $(this).attr("id");
        $("#" + inputId).removeClass('inputerror');
    });
</script>

<script>
    $("#button-image_01").click(function(e) {
        e.preventDefault();
        inputId = 'image_01';
        window.open('/file-manager/fm-button', 'fm', 'width=1200,height=700');
    });

    $("#button-icon").click(function(e) {
        e.preventDefault();
        inputId = 'icon';
        window.open('/file-manager/fm-button', 'fm', 'width=1200,height=700');
    });

    let inputId = '';

    function fmSetLink($url) {
        $("#" + inputId).val($url);
        $("#" + inputId + "_link").attr("src", $url);
    }
</script>

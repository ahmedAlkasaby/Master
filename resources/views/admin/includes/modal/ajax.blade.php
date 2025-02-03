<script>
    $(document).ready(function() {
        // إعدادات Toastr
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "timeOut": "3000",
            "extendedTimeOut": "1000",
            "positionClass": "toast-top-right"
        };

        // عند تقديم النموذج
        $('#{{ $formId }}').on('submit', function(e) {
            e.preventDefault();

            // إزالة الأخطاء الحالية
            $('#{{ $formId }} .form-control').removeClass('is-invalid');
            $('#{{ $formId }} .invalid-feedback').remove();

            let operationType = $('#operationType').val();
            let formData = new FormData(this);

            let ajaxUrl, ajaxType;
            if (operationType === 'update') {
                ajaxUrl = "{{ route($route.'.update', [$variable => '__Id__']) }}".replace('__Id__', $('#id').val());
                ajaxType = "PUT";
                formData.append('_method', 'PUT');
            } else {
                ajaxUrl = "{{ route($route.'.store') }}";
                ajaxType = "POST";
            }

            $.ajax({
                url: ajaxUrl,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // إغلاق النافذة المنبثقة بعد نجاح الطلب
                    $('#{{ $modelId }}').modal('hide');
                    toastr.success(response.message);
                    $('.table').load(window.location.href + ' .table');

                    // إعادة تعيين النموذج بعد النجاح فقط
                    $('#{{ $formId }}')[0].reset();
                    $('#{{ $formId }} .select2').val(null).trigger('change');
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            var input = $('#{{ $formId }} [name="' + key + '"]');
                            input.addClass('is-invalid');
                            if (input.next('.invalid-feedback').length === 0) {
                                input.after('<div class="invalid-feedback">' + value[0] + '</div>');
                            } else {
                                input.next('.invalid-feedback').text(value[0]);
                            }
                            input.blur();
                        });
                    }
                }
            });
        });
    });
</script>

jQuery(document).ready(function ($) {

    $(document).on('submit', '#contacts__page-form', function (event) {
        event.preventDefault();

        $('#contacts__page-form').css('filter', 'blur(3px)');
        var formData = new FormData(this);
        formData.append('action', 'send_contact_form_message');

        jQuery.ajax({
            url: variables.ajaxUrl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',

            success: function (data) {
                // console.log(data);
                $('#contacts__page-form').css('filter', 'blur(0px)');

                var inputValue = document.querySelectorAll('.text-input');
                for (var i = 0; i < inputValue.length; i++) {
                    inputValue[i].value = '';
                }
            }
        });
    });


    $(document).on('submit', '#servicies-form', function (event) {
        event.preventDefault();

        $('#servicies-form').css('filter', 'blur(3px)');
        var formData = new FormData(this);
        formData.append('action', 'servicies_form_message');

        jQuery.ajax({
            url: variables.ajaxUrl,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',

            success: function (data) {
                // console.log(data);
                $('#servicies-form').css('filter', 'blur(0px)');

                var inputValue = document.querySelectorAll('.text-input');
                for (var i = 0; i < inputValue.length; i++) {
                    inputValue[i].value = '';
                }
            }
        });
    });

});

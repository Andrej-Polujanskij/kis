import './jquery.validate';

jQuery(document).ready(function($) {

    $("#help__page-form").validate({
        errorPlacement: function(){
            return false;  // suppresses error message text
        },
        errorClass: 'error-validation-class'
    });
    $("#contacts__page-form").validate({
        errorPlacement: function(){
            return false;  // suppresses error message text
        },
        errorClass: 'error-validation-class'
    });
    $("#servicies-form").validate({
        errorPlacement: function(){
            return false;  // suppresses error message text
        },
        errorClass: 'error-validation-class'
    });


    $.validator.addClassRules({
        required: {
            required: true,
            minlength: 2
        },
        checkVal: {
            required: true,
        },
        requiredemail: {
            required: true,
            email: true
        },
        number: {
            required: true,
            number: true,
            minlength: 7
        },
        mintnine: {
            required: true,
            minlength: 9
        }
    });

})
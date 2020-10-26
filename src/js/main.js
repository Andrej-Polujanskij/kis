jQuery(document).ready(function ($) {
    //Offers tabs
    $('.offers-list li').click(function () {
        var tab_id = $(this).attr('data-title');
        $('.offers-list li').removeClass('current');
        $(this).addClass('current');

        $('.offers-container---wrapper').hide();
        $("#" + tab_id).fadeIn(300);
    })

    //Mobile menu show - hidden
    $('.mobile-btn').click(function () {
        if ($(this).is(':checked')) {
            $('.mobile-menu---block').fadeToggle(300);
            $('.hero__content').css({'opacity': '0'});
            setTimeout(function () {
                $('.mobile-menu---block').toggleClass('active');
            }, 150)
        } else {
            $('.mobile-menu---block').toggleClass('active')
            $('.hero__content').css({'opacity': '1'});
            setTimeout(function () {
                $('.mobile-menu---block').fadeToggle(300);
            }, 150)
        }
    })

    //Internetas + TV showing different prices
    $('.any__prices ul li').click(function() {
        var getID = $(this).attr('data-price');
        $(this).parents('ul').find('li.active').removeClass('active')
        $(this).addClass('active');

        $(this).parents('ul').parents('.offers-single__plans').parents('.offers-single__content').find('.offers-single__price').removeClass('active')

        $(this).parents('ul').parents('.offers-single__plans').parents('.offers-single__content').find(`#show-${getID}`).addClass('active')
    });

    //Add padding for last element
    $('.section-wrapper .section').last().addClass('section-last');

    //Form checkbox
    $('#check').change(function() {
        let chekInput = $( this ).prop( "checked" )
        $(this).parent().find('.checkbox').toggleClass('check');

        if (chekInput == true) {
            $(this).parent().find('.checkbox').css({ 'border': ' 2px solid transparent' });
        } else {
            $(this).parent().find('.checkbox').css({ 'border': '2px solid red' });
        }
    });

    $('#news-agree').change(function() {
        let chekInput = $( this ).prop( "checked" )
        $(this).parent().find('.checkbox').toggleClass('check');
    });

    $(".submit-input").click(function() {
        let chekInput = $('#check').is( ":checked" );

        if (chekInput == !true) {
            $('#check').parent().find('.checkbox').css({ 'border': '2px solid red' });
        } else {
            $('#check').parent().find('.checkbox').css({ 'border': ' 2px solid transparent' });
        }

    });



    //DUK tabs
    $('.questions-list li').click(function (){
        var tab_ID = $(this).attr('data-title');
        $('.questions-list li').removeClass('active');
        $(this).addClass('active');

        $('.duk-content__title').removeClass('active');
        $('.duk-content__text').slideUp(300);
        $('.answers-list li').removeClass('arrow-down');

        $('.answers-list').slideUp(300);
        $("#" + tab_ID).slideDown(300);
    })

    $('.duk-content__title').click(function (){
        if($(this).hasClass('active')){
            $(this).removeClass('active');
            $(this).next().slideUp(300);
            $(this).parent().removeClass('arrow-down');
        }else{
            $('.duk-content__title').removeClass('active');
            $(this).addClass('active');

            $('.duk-content__text').slideUp(300);
            $(this).next().slideDown(300);

            $('.answers-list li').removeClass('arrow-down');
            $(this).parent().addClass('arrow-down');
        }
    })

    //Redirect to servicies page
    $('.plan-btn').click(function(e){
        e.preventDefault();

        var dataPlan = $(this).parent().parent().find('.offers-single__price.active').attr('data-plan');
        var dataPrice =  $(this).parent().parent().find('.offers-single__price.active').attr('data-money');

        window.location.href = $(this).attr('href') + '&planID='+dataPlan+'&price='+dataPrice

    })

//Homepage addresses select add
    if($('body').hasClass('home') || $('body').hasClass('page-template-template-paslaugu_uzklausa')) {
        $.each(allAddresses, function (index, value) {

            $('.home-select').append($('<option/>', {
                value: index,
                text: index
            }));
        });
    }
    $('.home-select').on('select2:select', function (e) {
        var street = e.params.data.id;
        $('.street-select').find('option:not(:first)').remove();

        $.each(allAddresses, function(index, value) {
            if(index == street){

                $.each(value, function(index, value) {

                    $('.street-select').append($('<option/>', {
                        value: value,
                        text: value
                    }));
                })

            }
        })
    });

    // message after address check
    $('.checker__input---btn').click(function (e) {
        e.preventDefault();
        var street = $('.home-select').val()
        var home = $('.street-select').val()

        if( street !== '' && home !== ''){
            $('.checker__message___good').fadeIn(150);
            setInterval(function (){
                $('.checker__message___good').fadeOut(150);
            },2500)
        }
    })

});
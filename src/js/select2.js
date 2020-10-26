import '../../node_modules/select2/dist/js/select2.min';

jQuery(document).ready(function($) {
    $('.tv__internetas').select2({
        templateResult: resultState,
        minimumResultsForSearch: -1,
        placeholder: function(){
            $(this).data('placeholder');
        }
    });
    $('.net__speed').select2({
        templateResult: resultState,
        minimumResultsForSearch: -1
    });
    $('.only_net').select2({
        templateResult: resultState,
        minimumResultsForSearch: -1
    });
    $('.only_tv').select2({
        templateResult: resultState,
        minimumResultsForSearch: -1
    });
    $('.home-select').select2({
        templateResult: resultState,
        // minimumResultsForSearch: -1
    });
    $('.street-select').select2({
        templateResult: resultState,
        // minimumResultsForSearch: -1
    });

    function resultState(data, container) {
        if(data.element) {
            $(container).addClass($(data.element).attr("class"));
        }
        return data.text;
    }

    $('.tv__internetas').on('select2:select', function (e) {
        var data = e.params.data.id;

        if($('.help-item__title.hidden').hasClass('active')){
            $('.help-item__title.hidden').removeClass('active');
        }
        $('#' + data).addClass('active')

        $('.net__speed').find('option').remove();

        $('.net__speed').append(
            $('<option/>', {
            value: '100',
            text: '100 mb/s interneto greitis'
            }),
            $('<option/>', {
            value: '300',
            text: '300 mb/s interneto greitis'
            }),
            $('<option/>', {
            value: '600',
            text: '600 mb/s interneto greitis'
            })
        );

        $('.help-item__title.hidden.active').find('#show-' + 100).addClass('active')
    });

    $('.net__speed').on('select2:select', function (e) {
        var data = e.params.data.id;
        // var id = e.params.data.title;
        if($('.servicies---price').hasClass('active')){
            $('.servicies---price').removeClass('active');
        }

        $('.help-item__title.hidden.active').find('#show-' + data).addClass('active')
    });

    $('.only_net').on('select2:select', function (e) {
        var id = e.params.data.id;

        if($('.help-item__title.hidden').hasClass('active')){
            $('.help-item__title.hidden').removeClass('active');
        }

        $('#' + id).addClass('active')
    })
    $('.only_tv').on('select2:select', function (e) {
        var id = e.params.data.id;

        if($('.help-item__title.hidden').hasClass('active')){
            $('.help-item__title.hidden').removeClass('active');
        }

        $('#' + id).addClass('active')
    })







});
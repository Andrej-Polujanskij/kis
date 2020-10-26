import 'slick-carousel';

jQuery(document).ready(function($) {

    // Hero slider
    $('.slider__image').slick({
        slidesToShow: 1,
        fade: true,
        rows: 0,
        speed: 800,
        asNavFor: '.slider__text',
        prevArrow: $('.slider__arrow---left'),
        nextArrow: $('.slider__arrow---right'),
    });
    $('.slider__text').slick({
        slidesToShow: 1,
        fade: true,
        rows: 0,
        speed: 800,
        dots: true,
        asNavFor: '.slider__image',
        prevArrow: $('.slider__arrow---left'),
        nextArrow: $('.slider__arrow---right'),
    });




});
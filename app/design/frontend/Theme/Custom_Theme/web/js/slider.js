
require(['jquery', 'jquery/ui', 'slick'], function($){
    $(document).ready(function() {
        $('.slick-slider').slick({
            dots: false,
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true
        });

        $('.product-slick-slider').slick({
            dots: false,
            infinite: true,
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true
        });
    });
});
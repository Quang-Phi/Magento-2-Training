define([
    'ko',
    'jquery',
    'uiComponent',
    'slick'
], function (ko, $, Component) {
    'use strict';
    
    return Component.extend({
        initialize: function () {
            this._super();
        },
        slideImgArr: ko.observableArray([
            'https://phidinh.cmmage.app/static/version1698045694/frontend/Theme/Custom_Theme/en_US/images/Slider.png',
            'https://phidinh.cmmage.app/static/version1698045694/frontend/Theme/Custom_Theme/en_US/images/Slider.png',
            'https://phidinh.cmmage.app/static/version1698045694/frontend/Theme/Custom_Theme/en_US/images/Slider.png',
            'https://phidinh.cmmage.app/static/version1698045694/frontend/Theme/Custom_Theme/en_US/images/Slider.png',
            'https://phidinh.cmmage.app/static/version1698045694/frontend/Theme/Custom_Theme/en_US/images/Slider.png',
        ]),
        rightImgArr: ko.observableArray([
            'https://phidinh.cmmage.app/static/version1698045694/frontend/Theme/Custom_Theme/en_US/images/herobanner-1.png',
            'https://phidinh.cmmage.app/static/version1698045694/frontend/Theme/Custom_Theme/en_US/images/herobanner-2.png',
        ]),        
        
        initSlickSlider: function () {
            setTimeout(function () {
                $('.slick-slider').slick({
                    dots: false,
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    autoplay: true
                });
            }, 0);
        }
    });
});

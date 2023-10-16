require(['jquery'], function ($) {
    $(document).ready(function () {
        $('.nav-tabs a').on('click', function (e) {
            e.preventDefault();
            $('.nav-tabs li').removeClass('active');
            $(this).parent().addClass('active');
            $('.tab-content .tab-pane').removeClass('in active');
            $($(this).attr('href')).addClass('in active');
        });
    });
});

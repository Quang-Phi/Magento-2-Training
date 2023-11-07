require(['jquery'], function ($) {
    $(document).ready(function () {
        $('.action').on('click', function (e) {
            $content = $(this).parent().parent().find('.content');
            if($(this).hasClass('down')){
                $(this).removeClass('down');
            }else{
                $(this).addClass('down');
            }
           if(  $content.hasClass('show') ){
                $content.removeClass('show');
            }else{
                $content.addClass('show');
            }
        });
    });
});

require(['jquery'], function ($) {
    $(document).ready(function() {
      $('#contact-btn').on('click', function() {
        console.log('clicked');
        $('#contact-form').addClass('active');
      });
})
});

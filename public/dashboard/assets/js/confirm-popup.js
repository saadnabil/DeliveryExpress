jQuery(document).ready(function($) {
    //open popup
    $('.cd-popup-trigger').on('click', function(event) {
        event.preventDefault();
        var url = $(this).attr('href');
        $('.cd-popup').find('form').attr('action' , url);
        $('.cd-popup').addClass('is-visible');
    });
    $('.submit-popup-form').click(function(){
        $(this).next('form').submit();
    })
    //close popup
    $('.cd-popup').on('click', function(event) {
        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup') || $(event.target).is('.close-popup') ) {
            event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });

    //close popup when clicking the esc keyboard button
    $(document).keyup(function(event) {
        if (event.which == '27') {
            $('.cd-popup').removeClass('is-visible');
        }
    });
});

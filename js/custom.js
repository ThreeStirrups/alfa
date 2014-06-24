jQuery(document).ready(function($){
    var top = $('.entry-content').offset().top - 55;
    $(window).scroll(function (event){
        var y = $(this).scrollTop();
        if (y >= top)
            $('body').addClass('scroll');
        else
            $('body').removeClass('scroll');
    });
    $('.toggle-search, .overlay').on('click', function() {
        $('.search-drop, .overlay').toggleClass('show');
    });
    $('.toggle-menu').on('click', function() {
        $('.nav-primary').toggleClass('show');
        $('.toggle-menu .dashicons').toggleClass('dashicons-arrow-right-alt2').toggleClass('dashicons-arrow-left-alt2');
    });
    $('.toggle-comments, .comments-wrap .dashicons-no-alt').on('click', function() {
        $('.content').toggleClass('show');
    });
});


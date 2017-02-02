(function ($) {

    $(function() {



    });

    $(window).on("load resize", function() {
        stickyFooter();
    });

    function stickyFooter() {
        var $body = $('body'),
            $footer = $('#footer'),
            wh = window.innerHeight,
            fh = $footer.outerHeight(true),
            bh = $body.outerHeight(true);
        if (wh > bh) {
            $body.addClass('sticky-footer').css('padding-bottom', fh);
        } else {
            $body.removeClass('sticky-footer').css('padding-bottom', 0);
        }
    }

})(jQuery);
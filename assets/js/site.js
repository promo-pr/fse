(function ($) {

    $(function() {

        $('.header-title-h1').click(function () {
            location.href = '/';
        });
        $(window).on("load resize", function() {
            stickyFooter();
        });
        $('.dropdown').on('shown.bs.dropdown hidden.bs.dropdown', function () {
            stickyFooter();
        });
        $('.nav-side .dropdown.active .dropdown-toggle').trigger('click');

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
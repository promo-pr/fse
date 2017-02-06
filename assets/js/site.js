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

        $('#slider1').bxSlider({
            minSlides: 3,
            maxSlides: 3,
            slideWidth: 255,
            slideMargin: 30,
        });

        $('#form-search').on('change keyup', function (form) {

            var name = $('#form-search-name').val();

            if (name.length > 2) {
                $.ajax({
                    type: "POST",
                    url: "/search",
                    data: {
                        'name' : name
                    },
                    dataType: "json",
                    success: function(result){
                        var row = '';
                        $.each(result, function( i, obj ) {
                            row += '<tr>';
                            row += '<td>' +  (i+1) + '</td>';
                            row += '<td>' + obj.name + '</td>';
                            row += '</tr>';
                        });

                        $('.form-search-result-wrapper').fadeIn();
                        $('#form-search-result-body').html(row);
                        console.log(row);
                    }
                });
            } else {
                $('.form-search-result-wrapper').fadeOut();
            }

        });

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
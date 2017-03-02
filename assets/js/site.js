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
            minSlides: 1,
            maxSlides: 1,
            slideWidth: 255,
            auto: true,
            pager: false
        });

        $('#form-search').on('change keyup', function (form) {

            var name = $('#form-search-name').val();
            var county = $('#form-search-country').val();
            var types_work = $('#form-search-experts').val();
            if (name.length > 2) {
                $.ajax({
                    type: "POST",
                    url: "/search",
                    data: {
                        'fio' : name,
                        'county':county,
                        'types_work':types_work
                    },
                    dataType: "json",
                    success: function(result){
                        var row = '';
                        $.each(result, function( i, obj ) {
                            row += '<tr class="search-title" title="Контакты" onclick=$(this).toggleClass("activeted");$(".search-body_'+i+'").toggleClass("snow");>';
                            //row += '<td>' +  (i+1) + '</td>';
                            row += '<td class="name">' + obj.fio +'<span class="text-muted"> | '+ obj.region+'</span> </td>';
                            row += '<td class="text-right">' + obj.work_exp + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="text-muted contact_items">Адресс </td>';
                            row += '<td class="contact_val text-right">' + obj.adress + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="text-muted contact_items">Контактный телефон</td>';
                            row += '<td class="contact_val text-right">' + obj.phone + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="text-muted contact_items">Електронная почта</td>';
                            row += '<td class="contact_val text-right">' + obj.mail + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="text-muted contact_items">Сайт</td>';
                            row += '<td class="contact_val text-right">' + obj.site + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="contact-about text-right" colspan="2" title="Открыть информацию об эксперте" onclick=location.href="expert/'+obj.slug+'"><span class="btn btn-warning">Подробнее</span></td>';
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

        $('.types_work').on('click', function () {

            var types_work = $(this).val();

                $.ajax({
                    type: "POST",
                    url: "/search",
                    data: {
                        'types_work':types_work
                    },
                    dataType: "json",
                    success: function(result){
                        var row = '';
                        $.each(result, function( i, obj ) {
                            row += '<tr class="search-title" title="Контакты" onclick=$(this).toggleClass("activeted");$(".search-body_'+i+'").toggleClass("snow");>';
                            //row += '<td>' +  (i+1) + '</td>';
                            row += '<td class="name">' + obj.fio +'<span class="text-muted"> | '+ obj.region+'</span> </td>';
                            row += '<td class="text-right">' + obj.work_exp + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="text-muted contact_items"><i class="material-icons">location_city</i> Адресс </td>';
                            row += '<td class="contact_val text-right">' + obj.adress + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="text-muted contact_items"><i class="material-icons">contact_phone</i> Контактный телефон</td>';
                            row += '<td class="contact_val text-right">' + obj.phone + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="text-muted contact_items"><i class="material-icons">contact_mail</i> Электронная почта</td>';
                            row += '<td class="contact_val text-right">' + obj.mail + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="text-muted contact_items"><i class="material-icons">dvr</i> Сайт</td>';
                            row += '<td class="contact_val text-right">' + obj.site + '</td>';
                            row += '</tr>';
                            row += '<tr class="body_items search-body_'+i+' snow">';
                            row += '<td class="contact-about text-right" colspan="2" title="Открыть информацию об эксперте" onclick=location.href="expert/'+obj.slug+'"><span class="btn btn-warning">Подробнее</span></td>';
                            row += '</tr>';
                        });
                        $('.form-search-result-wrapper').fadeIn();
                        $('#form-search-result-body').html(row);
                        console.log(row);
                    }
                });


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
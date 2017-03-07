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
                    success: function(result){searchExperts(result)}
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
                    success: function(result){searchExperts(result)}
                });


        });

    });

    function searchExperts(result) {

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

    // Magnific Popup setting Default
    $.extend(true, $.magnificPopup.defaults, {
        mainClass: 'mfp-with-zoom', // this class is for CSS animation below
        zoom: {
            enabled: true, // By default it's false, so don't forget to enable it
            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function
            opener: function (openerElement) {
                return openerElement.is('img') ? openerElement : openerElement.find('img');
            }
        },
        tClose: 'Закрыть (Esc)', // Alt text on close button
        tLoading: 'Загрузка...', // Text that is displayed during loading. Can contain %curr% and %total% keys
        gallery: {
            tPrev: 'Назад', // Alt text on left arrow
            tNext: 'Вперед', // Alt text on right arrow
            tCounter: '%curr% из %total%' // Markup for "1 of 7" counter
        },
        image: {
            tError: '<a href="%url%">Изображение</a> не найдено.' // Error message when image could not be loaded
        },
        ajax: {
            tError: '<a href="%url%">Содержимое</a> не найдено.' // Error message when ajax request failed
        }
    });

    $('.image-popup').magnificPopup({   // One Image popup
        type: 'image'
    });
    $('.image-popup').magnificPopup({   // One Image popup
        type: 'image'
    });

    $('.image-gallery').each(function() {   //Gallery
        $(this).magnificPopup({
            delegate: '.image-item', // the selector for gallery item
            type: 'image',
            gallery: {
                enabled:true,
                navigateByImgClick: true,
                preload: [1,1]
            }
        });
    });

    $('.iframe-popup').magnificPopup({   //Iframe
        type: 'iframe'
    });

    $('.inline-popup').magnificPopup({   //Iframe
        type: 'inline'
    });

    $('.ajax-popup').magnificPopup({    //Ajax
        type: 'ajax'
    });
    $('.popup-with-form').magnificPopup({
        type: 'inline',
        preloader: false,
        focus: '#name',

        // When elemened is focused, some mobile browsers in some cases zoom in
        // It looks not nice, so we disable it:
        callbacks: {
            beforeOpen: function() {
                if($(window).width() < 700) {
                    this.st.focus = false;
                } else {
                    this.st.focus = '#name';
                }
            }
        }
    });
    //Ajax-form-widget
    $(document).on('ready ajaxComplete', function () {
        $('.ajax-form').on( 'submit', function(e) {
            e.preventDefault();
            var $form = $(this);
            var formData = $(this).serialize();
            $(this).find('button:submit')
                .html('<i class="material-icons refresh-animate">cached</i></span>&nbsp;Подождите...')
                .addClass('disabled');
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: formData,
                success: function (data) {
                    $form.replaceWith($(data).children());
                },
                error: function () {
                    alert('Что-то пошло не так. Попробуйте позже.');
                }
            });
        });
        $('.has-error').children(':input').on('change', function (e) {
            $(e.target).parent().removeClass('has-error');
            $(e.target).siblings('.help-block-error').remove();
        });
    });
})(jQuery);
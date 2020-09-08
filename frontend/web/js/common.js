$('.promo-slider').on('init', function (event, slick) {
    animation_promo();
});

$('.promo-slider').slick({
    dots: false,
    infinite: true,
    speed: 500,
    fade: false,
    autoplay: true,
    autoplaySpeed: 4000,
    prevArrow: $('.promo-prev'),
    nextArrow: $('.promo-next'),
    cssEase: 'linear'
});


$('.promo-slider').on('afterChange', function (event, slick, currentSlide) {
    animation_promo();
});

function animation_promo() {

    setTimeout(function () {
        $('.promo-slider-headline').removeClass('animation');
        $('.slick-active .promo-slider-headline').addClass('animation');
    }, 50);

    setTimeout(function () {
        $('.promo-slider-description').removeClass('animation');
        $('.slick-active .promo-slider-description').addClass('animation');
    }, 600);

    setTimeout(function () {
        $('.promo-slider-link-wrapper').removeClass('animation');
        $('.slick-active .promo-slider-link-wrapper').addClass('animation');
    }, 1000);

}


$('.investment-options-slider').slick({
    dots: false,
    infinite: true,
    speed: 700,
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: $('.investment-prev'),
    nextArrow: $('.investment-next'),
    responsive: [
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 568,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
    ]
});


$("[data-mask='callback-catalog-phone']").mask("+7 9 9  9 9 9  9 9  9 9 9");


if ($(window).width() < 1200 && $(window).width() > 991) {

    $('.investition-drop').click(function () {
        $(this).toggleClass('open-drop');
        $('.client-drop').removeClass('open-drop');
    });

    $('.client-drop').click(function () {
        $(this).toggleClass('open-drop');
        $('.investition-drop').removeClass('open-drop');
    });

    $(document).on('click', function (e) {
        if (!$(e.target).closest(".has-drop").length) {
            $('.has-drop').removeClass('open-drop');
        }
        e.stopPropagation();
    });

}
if ($(window).width() < 991) {

    $('.has-drop a').click(function () {
        $(this).parent().toggleClass('open-drop');
    });


}


$('.burger, .overlay').click(function () {
    $('.navigation--vd').toggleClass('open-menu');
    $('.burger').toggleClass('burger_open');
    $('body').toggleClass('overlow');
    $('.has-drop').removeClass('open-drop');
    $('.overlay').toggleClass('show_overlay');
});


if ($(window).width() > 1200) {
    var wow = new WOW(
        {
            callback: function (box) {
                $('div.text-strike-column').each(function () {
                    if ($(this).hasClass('animated')) {
                        $(this).addClass('strike_animated');
                    }
                });
            }
        }
    );
    wow.init();
}

if ($("section").is($('.statistics'))) {
    $(document).ready(function () {

        var show = true;
        var countbox = ".statistics";
        $(window).on("scroll load resize", function () {
            if (!show) return false; // Отменяем показ анимации, если она уже была выполнена
            var w_top = $(window).scrollTop(); // Количество пикселей на которое была прокручена страница
            var e_top = $(countbox).offset().top; // Расстояние от блока со счетчиками до верха всего документа
            var w_height = $(window).height(); // Высота окна браузера
            var d_height = $(document).height(); // Высота всего документа
            var e_height = $(countbox).outerHeight(); // Полная высота блока со счетчиками
            if (w_top + 500 >= e_top || w_height + w_top == d_height || e_height + e_top < w_height) {
                $('.count-animation').css('opacity', '1');
                $('.count-animation').spincrement({
                    thousandSeparator: "",
                    duration: 3500
                });

                show = false;
            }
        });

    });
}


$('.open-modal-button').magnificPopup({
    type: 'inline',
    midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
});


$(".open-modal-button").on("click", function (e) {
    e.preventDefault();
    var strategy_name = $(this).data("name");
    var advice_name = $("#advice_name");
    advice_name.val(strategy_name);
});

$(".mkvs-toggle-drop").on("click", function (evt) {
    evt.preventDefault();
    $(this).closest(".mkvs-user-account-info").toggleClass("mkvs-user-info-dropdown-open");
});

if ($(window).width() > 768) {
    $(document).on('click', function (e) {
        if (!$(e.target).closest(".mkvs-user-account-info").length) {
            $(".mkvs-user-account-info").removeClass("mkvs-user-info-dropdown-open");
        }
        e.stopPropagation();
    });
}

$("#profile-date").dateDropdowns({
    submitFormat: "dd-mm-yyyy",
    daySuffixes: false,
    monthSuffixes: false,
    dayLabel: 'День',
    monthLabel: 'Месяц',
    yearLabel: 'Год',
    monthLongValues: ['Январь‎', 'Февраль', 'Март‎', 'Апрель‎', 'Май', 'Июнь‎', 'Июль', 'Август', 'Сентябрь‎', 'Октябрь‎', 'Ноябрь‎', 'Декабрь']

});


$(function () {
    $('.tabs-nav a').click(function () {

        //Check if the tabs menu has active class
        $('.tabs-nav li').removeClass('active');
        $(this).parent().addClass('active');

        // Display active tab
        var currentTab = $(this).attr('href');
        $('.tabs-content .tab-body').hide();
        $(currentTab).show();

        return false;
    });
});


$('.date-profile-select select').wrap('<div class="select-prof-wrapper"></div>');


$('.input-file').change(function () {
    var fileName = $(this).val().replace("C:\\fakepath\\", "");
    var fileNameText = $(this).closest('.vd_documents-item').find('.file-name');
    fileNameText.html(fileName);
});


function printDiv(divName) {

    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
}


$(".print-btn").on("click", function () {
    printDiv("print-content");
});

$(".mkvs-menu-open-button").on("click", function () {
    $(".user-account-menu-list").slideToggle();
    $(this).toggleClass("mkvs-rotate");
});

$("#form-signup").on("submit", function (evt) {
    if ($("#vd-auotorization").is(":checked")) {
        $(".hint").removeClass("hint--open");
        return true;
    } else {
        $(".hint").removeClass("hint--open");
        $(".hint").addClass("hint--open");
        evt.preventDefault();
    }
});

$('.collapse-div').click(function (e) {
    e.preventDefault();
    console.log('click');
    $(this).hide();
    var div = $(this).attr('data-index');
    $(div).slideToggle('slow');
});



$('.btn-copy-qr-code').on('click', function (e) {
    CopyToClipboard("qr-code-number");
   /* var copyText = document.getElementById("qr-code-number");
    var range = document.createRange();
    range.selectNode(copyText);
    window.getSelection().addRange(range);
    try {
        document.execCommand('copy');
        alert('Скопировано');
    } catch (err) {
        alert('Не удалось скопировать');
    }
    window.getSelection().removeAllRanges();*/
});
$('.qr-code-number-class').click(function (e) {
    CopyToClipboard("qr-code-number");
});

function CopyToClipboard(containerid) {
    // современный объект Selection
    window.getSelection().removeAllRanges();
    if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select().createTextRange();
        document.execCommand("Copy");

    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().addRange(range);
        document.execCommand("Copy");
        alert("Скопировано");
    }
}
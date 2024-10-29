(function($) {
    "use strict";
    //Check element in viewport
    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();

        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();

        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    $(document).ready(function() {
        // var $menuIcon = $('.menu-humburgur-icon'),$header = $('#header');
        // $menuIcon.on('click',function(e){
        // 	$(this).toggleClass('open');
        // 	var target = $(this).data('target');
        // 	$header.toggleClass('header--open');
        // 	$(target).slideToggle();
        // })
        var audio = document.getElementById('myAudio');
        audio.load();
        $('.icon-mute').on('click', function() {
            if ($(this).hasClass('playing')) {
                $(".icon-mute").removeClass("playing").removeClass("stopped");
                $(".icon-mute").addClass("stopped");
                $(".icon-mute").attr('src', "images/audio-off.png");
                $("#myAudio").prop("muted", true);
                audio.pause();
            } else {
                $(".icon-mute").removeClass("playing").removeClass("stopped");
                $(".icon-mute").addClass("playing");
                $(".icon-mute").attr('src', "images/audio-on.png");
                $("#myAudio").prop("muted", false);
                audio.play();
            }
        });

        $('.gallery-slider').slick({
            nextArrow: $(".core-values__arrow--right"),
            prevArrow: $(".core-values__arrow--left"),
            dots: false,
            autoplay: false,
        })

        $(window).on('scroll', function() {
            if ($('#site-main').isInViewport()) {
                $('#fixed-nav').fadeIn();
            } else {
                $('#fixed-nav').fadeOut();
            }
        })

    });


})(jQuery);
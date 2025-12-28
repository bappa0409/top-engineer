/**
 * ------------------------------------------------------
 * Custom Frontend JS
 * Requires: jQuery, Bootstrap, AOS
 * ------------------------------------------------------
 */

(function ($) {
    "use strict";

    /**
     * Document Ready
     */
    $(document).ready(function () {

        /* ======================================
         * Bootstrap Form Validation
         * ====================================== */
        $('.needs-validation').each(function () {
            const form = this;

            $(form).on('submit', function (event) {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                $(form).addClass('was-validated');
            });
        });

        /* ======================================
         * AOS Initialization
         * ====================================== */
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                easing: 'ease-in-out',
                once: true,
                mirror: false
            });
        }

        /* ======================================
         * Scroll to Top Button
         * ====================================== */
        const scrollTop = $('#scroll-top');

        if (scrollTop.length) {
            $(window).on('scroll', function () {
                if ($(this).scrollTop() > 300) {
                    scrollTop.addClass('active');
                } else {
                    scrollTop.removeClass('active');
                }
            });

            scrollTop.on('click', function (e) {
                e.preventDefault();
                $('html, body').animate({ scrollTop: 0 }, 500);
            });
        }

        /* ======================================
         * Mobile Navigation Toggle
         * ====================================== */
        $('.mobile-nav-toggle').on('click', function () {
            $('body').toggleClass('mobile-nav-active');
            $(this).toggleClass('bi-list bi-x');
        });

        $('.navbar a').on('click', function () {
            if ($('body').hasClass('mobile-nav-active')) {
                $('body').removeClass('mobile-nav-active');
                $('.mobile-nav-toggle').toggleClass('bi-list bi-x');
            }
        });

        /* ======================================
         * Smooth Scroll (Anchor Links)
         * ====================================== */
        $('a.scrollto').on('click', function (e) {
            const target = $(this.hash);

            if (target.length) {
                e.preventDefault();

                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 600);
            }
        });

        /* ======================================
         * Hero Carousel Safety (Bootstrap)
         * ====================================== */
        if ($('#heroCarousel').length && typeof bootstrap !== 'undefined') {
            new bootstrap.Carousel('#heroCarousel', {
                interval: 5000,
                pause: 'hover',
                ride: 'carousel'
            });
        }

    });

})(jQuery);

document.addEventListener('DOMContentLoaded', function () {

    const heroSlider = document.querySelector('.wpt-hero-slider');

    if (!heroSlider) {
        return;
    }

    new Swiper('.wpt-hero-slider', {

        loop: true,
        speed: 1200,
        effect: 'fade',
        grabCursor: true,

        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });

});
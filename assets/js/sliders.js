// Hero slider
document.addEventListener('DOMContentLoaded', function() {
    new Swiper('.hero-slider', {
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        speed: 600,
        effect: 'fade',
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.slider-button--next',
            prevEl: '.slider-button--prev',
        }
    });
});

// Product carousel
const productSlider = new Swiper(".product-carousel", {
    slidesPerView: 4.2,
    spaceBetween: 20,
    loop: false, // вимкнено
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    navigation: {
        nextEl: '.slider-button--next',
        prevEl: '.slider-button--prev',
    },
    breakpoints: {
        320: {
        slidesPerView: 2.2,
        spaceBetween: 12,
        },
        768: {
        slidesPerView: 3.2,
        spaceBetween: 14,
        },
        1025: {
        slidesPerView: 2.2,
        spaceBetween: 18,
        },
        1200: {
        slidesPerView: 3.2,
        spaceBetween: 20,
        }
    }
});

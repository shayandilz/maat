import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const swiper = new Swiper('.home-swiper', {
    // Optional parameters
    loop: true,
    effect: 'slide',
    navigation: {
        nextEl: '.swiper-prev',
        prevEl: '.swiper-next',
    },
    pagination: {
        el: '.swiper-paginate',
        type: 'fraction',
        formatFractionCurrent: function (number) {
            return ('0' + number).slice(-2);
        },
        formatFractionTotal: function (number) {
            return ('0' + number).slice(-2);
        },
        renderFraction: function (currentClass, totalClass) {
            return '<span class="' + currentClass + '"></span>' +
                ' / ' +
                '<span class="' + totalClass + '"></span>';
        }
    },
    autoplay: {
        delay: 2000,
    },
    disableOnInteraction: false,
})
const client = new Swiper('.client-swiper', {
    // Optional parameters
    loop: true,
    effect: 'slide',
    speed: 500,
    loopFillGroupBlank: false,
    grabCursor: true,
    slidesPerView: 3,
    spaceBetween: 70,
    breakpoints: {
        768: {
            slidesPerView: 5,
            spaceBetween: 140
        }
    },
    centeredSlides: true,
    slideNextClass: 'scaled-down',
    slidePrevClass: 'scaled-down',
    navigation: {
        nextEl: '.swiper-prev-client',
        prevEl: '.swiper-next-client',
    },
    // autoplay: {
    //     delay: 2000,
    // },
    disableOnInteraction: false,
})
import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';

const swiper = new Swiper('.home-swiper', {
    // Optional parameters
    loop: true,
    effect: 'fade',
    navigation: {
        nextEl: '.swiper-prev',
        prevEl: '.swiper-next',
    },
    speed: 1500,
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
        delay: 3000,
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
    autoplay: {
        delay: 2000,
    },
    disableOnInteraction: false,
    // Enable lazy loading for slides out of view
    // preloadImages: 3,
    // updateOnImagesReady: true,
    // lazy: {
    //     loadOnTransitionStart: true,
    //     lazyLoadingInPrevNext: true,
    //     lazyLoadingInPrevNextAmount: 5, // Number of images to preload ahead of the current slide
    //     lazyLoadingOnTransitionStart: true,
    // },
})
const portfolio = new Swiper('.portfolio-swiper', {
    // Optional parameters
    loop: false,
    effect: 'slide',
    speed: 500,
    loopFillGroupBlank: false,
    grabCursor: true,
    slidesPerView: 1,
    centeredSlides: true,
    slideNextClass: 'scaled-down',
    slidePrevClass: 'scaled-down',
    navigation: {
        nextEl: '.swiper-next',
        prevEl: '.swiper-prev',
    },
    disableOnInteraction: false,
    pagination: {
        el: '.swiper-paginate-portfolio',
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
})
const achievements = new Swiper('.achievements-swiper', {
    // Optional parameters
    loop: true,
    effect: 'slide',
    speed: 500,
    loopFillGroupBlank: false,
    grabCursor: true,
    slidesPerView: 1,
    breakpoints: {
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        }
    },
    centeredSlides: true,
    slideNextClass: 'scaled-down',
    slidePrevClass: 'scaled-down',
    navigation: {
        nextEl: '.swiper-prev-achiv',
        prevEl: '.swiper-next-achiv',
    },
    autoplay: {
        delay: 2000,
    },
    disableOnInteraction: false,
})
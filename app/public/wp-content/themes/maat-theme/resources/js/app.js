require('./bootstrap');
import 'swiper/css';
import Swiper from 'swiper/bundle';
import 'swiper/css/bundle';
import $ from "jquery";
import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles

$(document).ready(function () {

    $(window).scroll(function () { // check if scroll event happened
        if ($(document).scrollTop() > 30) { // check if user scrolled more than 50 from top of the browser window

            $('.backTo_Top').removeClass('outro');
        } else {
            $('.backTo_Top').addClass('outro');
        }
    })

})

document.addEventListener('DOMContentLoaded', function () {


    // const svgList = document.querySelectorAll(".svg-list path");
    //
    // svgList.forEach((svg, index) => {
    //     svg.classList.add("draw-anim");
    //     svg.style.setProperty("--animation-delay", `${index * 0.5}s`);
    // });

    // expand element height
    const expandBtns = document.querySelectorAll(".expandButton");
    const expandableDivs = document.querySelectorAll(".expandText");
    expandBtns.forEach((btn, i) => {
        btn.addEventListener("click", () => {
            const expandedHeight = expandableDivs[i].scrollHeight;
            const currentHeight = expandableDivs[i].offsetHeight;

            if (currentHeight === expandedHeight) {
                expandableDivs[i].style.height = "";
                btn.classList.remove("rotate");
            } else {
                expandableDivs[i].style.height = `${expandedHeight}px`;
                btn.classList.add("rotate");
            }
        });
    });


    // toggle scrolled
    const toggleScrollClass = function () {
        if (window.scrollY > 24) {
            document.body.classList.add('scrolled');
        } else {
            document.body.classList.remove('scrolled');
        }
    }

    toggleScrollClass();
//     tabs animated pane
    // Select the tabs and tab content elements
    const tabs = document.querySelectorAll('.nav-tabs .nav-link');
    const tabContent = document.querySelectorAll('.tab-content .tab-pane');
    let counter = 0;
    tabs.forEach((tab, index) => {
        tab.addEventListener('shown.bs.tab', () => {
            // Remove the "aos-animate" class from all elements
            const aosEls = document.querySelectorAll('.aos');
            aosEls.forEach(el => el.classList.remove('aos-animate'));
            // Add the "aos-animate" class to the current tab elements
            const currentTabEls = tabContent[index].querySelectorAll('.aos');
            currentTabEls.forEach(el => el.classList.add('aos-animate'));
            currentTabEls.forEach(
                el => {
                    el.setAttribute('data-aos-delay', counter + '00')
                    counter++;
                }
            );
            counter = 0;
        });
    });


// Loop through each element and set its height equal to its width
    const elements = document.querySelectorAll(".my-list-item");
    elements.forEach((element) => {
        const width = element.offsetWidth;
        element.style.height = width + "px";
    });

    // AOS
    AOS.init();


    // svg draw
    let svg = document.getElementById('about_svg');
    if (svg) {
        svg.classList.add('draw');
    }

    // menu
    const nav = {
        config: {
            body: "body",
            navContainer: ".nav-container",
            burger: ".burger"
        },
        qs: function (elem) {
            return document.querySelector(elem);
        },
        handleMenu: function () {
            const self = this;
            const body = self.qs(self.config.body);
            const burger = self.qs(self.config.burger);

            burger.addEventListener("click", function () {
                body.classList.toggle("is--active");
            });
        },
        init: function () {
            const self = this;

            self.handleMenu();
        }
    };
    nav.init();


    // tooltip bootstrap
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    //check scroll to take actions on it
    window.addEventListener('scroll', function () {
        toggleScrollClass();
    });

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
    })

    class SupahScroll {
        constructor(options) {
            this.opt = options || {};
            this.el = this.opt.el ? this.opt.el : ".supah-scroll";
            this.speed = this.opt.speed ? this.opt.speed : 0.1;
            this.init();
        }

        init() {
            this.scrollY = 0;
            this.supahScroll = document.querySelectorAll(this.el)[0];
            this.supahScroll.classList.add("supah-scroll");
            this.events();
            this.update();
            this.animate();
        }

        update() {
            if (this.supahScroll === null) return;
            document.body.style.height = `${
                this.supahScroll.getBoundingClientRect().height
            }px`;
        }

        pause() {
            document.body.style.overflow = "hidden";
            cancelAnimationFrame(this.raf);
        }

        play() {
            document.body.style.overflow = "inherit";
            this.raf = requestAnimationFrame(this.animate.bind(this));
        }

        destroy() {
            this.supahScroll.classList.remove("supah-scroll");
            this.supahScroll.style.transform = "none";
            document.body.style.overflow = "inherit";
            window.removeEventListener("resize", this.update);
            cancelAnimationFrame(this.raf);
            delete this.supahScroll;
        }

        animate() {
            this.scrollY += (window.scrollY - this.scrollY) * this.speed;
            this.supahScroll.style.transform = `translate3d(0,${-this.scrollY}px,0)`;
            this.raf = requestAnimationFrame(this.animate.bind(this));
        }

        scrollTo(y) {
            window.scrollTo(0, y);
        }

        staticScrollTo(y) {
            cancelAnimationFrame(this.raf);
            this.scrollY = y;
            window.scrollTo(0, y);
            this.supahScroll.style.transform = `translate3d(0,${-y}px,0)`;
            this.play();
        }

        events() {
            window.addEventListener("load", this.update.bind(this));
            window.addEventListener("resize", this.update.bind(this));
        }
    }

    /*------------------------------
    Initialize
    ------------------------------*/
    const supahscroll = new SupahScroll({
        el: "main",
        speed: 0.1
    });


});



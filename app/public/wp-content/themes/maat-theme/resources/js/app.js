require('./bootstrap');
import $ from "jquery";
import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles

$(document).ready(function () {

    $(window).scroll(function () { // check if scroll event happened
        if ($(document).scrollTop() > 30) { // check if user scrolled more than 50 from top of the browser window
            $('.backTo_Top').removeClass('outro');
            $('.backTo_Top').addClass('intro');
        }
        else if ($(document).scrollTop() == 0) {
            $('.backTo_Top').addClass('outro');
            $('.backTo_Top').removeClass('intro');
        }
    })
    function resizeForm(){
        var width = (window.innerWidth > 0) ? window.innerWidth : document.documentElement.clientWidth;
        if(width > 1024 && !$("body").is(".post-type-archive-portfolio") && !$("body").is(".page-template-work")){
            require('./smoothscroll');
        } else {

        }
    }
    window.onresize = resizeForm;
    resizeForm();
})

document.addEventListener('DOMContentLoaded', function () {


    require('./swiper');
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


});



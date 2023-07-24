import {set} from "lodash/object";

require('./bootstrap');
import $ from "jquery";
import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
import VanillaTilt from 'vanilla-tilt';

$(document).ready(function () {

    $(window).scroll(function () { // check if scroll event happened
        if ($(document).scrollTop() > 30) { // check if user scrolled more than 50 from top of the browser window
            $('.backTo_Top').removeClass('outro');
            $('.backTo_Top').addClass('intro');
        } else if ($(document).scrollTop() == 0) {
            $('.backTo_Top').addClass('outro');
            $('.backTo_Top').removeClass('intro');
        }
    })

    function resizeForm() {
        var width = (window.innerWidth > 0) ? window.innerWidth : document.documentElement.clientWidth;
        if (width > 1024 && !$("body").is(".post-type-archive-portfolio") &&
            !$("body").is(".page-template-work") &&
            !$("body").is(".page-template-landing") &&
            !$("body").is(".single-post ")
        ) {
            require('./smoothscroll');
        } else {

        }
    }

    window.onresize = resizeForm;
    resizeForm();
})


document.addEventListener('DOMContentLoaded', function () {
    require('./swiper');

    // tilting the modal card
    VanillaTilt.init(document.querySelectorAll(".glass-card"), {
        max: 1,
        speed: 100,
    });

    // AOS
    AOS.init();

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

    function handleMediaQuery(mq) {
        const elements = document.querySelectorAll(".my-list-item");
        if (mq.matches) {
            // Loop through each element and set its height equal to its width
            elements.forEach((element) => {
                const width = element.offsetWidth - 40;
                element.style.height = width + "px";
            });
        }
    }

    var mq = window.matchMedia("(min-width: 768px)");
    mq.addListener(handleMediaQuery);
    handleMediaQuery(mq); // Call once on page load


    // svg draw
    let svg = document.getElementById('about_svg');
    if (svg) {
        svg.classList.add('draw');
    }

    const svgList = document.querySelectorAll(".svg-service svg");
    svgList.forEach((svg, index) => {
        setTimeout(() => {
            svg.classList.add("drawServices");
        }, index * 10); // multiply index by 2 to add a 2 millisecond delay between each iteration
    });


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

// Add this script to the bottom of your HTML file or in a separate JS file
    const progressBar = document.querySelector(".progress-bar");
    const blog = document.querySelector("#blog");
    if (blog) {
        window.addEventListener("scroll", () => {
            // Get the distance of the user from the top of the blog
            const scrollTop = window.pageYOffset;
            const blogTop = blog.offsetTop;
            const blogHeight = blog.offsetHeight;
            const scrolled = (scrollTop - blogTop) / (blogHeight - window.innerHeight) * 100;

            // Update the progress bar width and aria-valuenow attribute
            progressBar.style.width = `${scrolled}%`;
            progressBar.setAttribute("aria-valuenow", scrolled);
        });
    }



    const MaskText = document.querySelector('#section2 > div');
    if (MaskText){
        var letterToZoom = document.getElementById('mask-text'); // first letter
        MaskText.style.opacity = '0';
        setTimeout(function () {
            document.querySelector('#section2 > div').style.opacity = '1';
            setTimeout(function () {
                letterToZoom.style.transform = 'scale(25)';
                document.getElementById('mask-text').style.opacity = '0';
                document.querySelector('#section2 > div').style.zIndex = '10';

            }, 400)
        }, 4500)
    }


});



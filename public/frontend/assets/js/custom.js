/*-----------------------------------------------------------------------------------
    Fixed Version — All Scripts Working Together
-----------------------------------------------------------------------------------*/

// تأكد أن jQuery loaded
(function ($) {
    'use strict';

    // DOM READY
    document.addEventListener('DOMContentLoaded', function () {
        if (typeof lucide !== 'undefined') lucide.createIcons();
        if (typeof WOW !== 'undefined') new WOW().init();

        /*--------------------------------------
            Swiper Sliders
        --------------------------------------*/
        if (typeof Swiper !== 'undefined') {
            new Swiper('.mySwiper', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 10,
                pagination: { el: '.mySwiper-pagination', clickable: true },
                navigation: { nextEl: '.mySwiper-next', prevEl: '.mySwiper-prev' },
                autoplay: { delay: 4000, disableOnInteraction: false }
            });

            new Swiper('.newsSwiper', {
                loop: true,
                spaceBetween: 20,
                slidesPerView: 4,
                pagination: { el: '.news-pagination', clickable: true },
                navigation: { nextEl: '.news-next', prevEl: '.news-prev' },
                autoplay: { delay: 4000, disableOnInteraction: false },
                breakpoints: {
                    0: { slidesPerView: 1 },
                    480: { slidesPerView: 2 },
                    768: { slidesPerView: 3 },
                    1024: { slidesPerView: 4 }
                }
            });
        }

        /*--------------------------------------
            Counter
        --------------------------------------*/
        const boxes = document.querySelectorAll('.counter-box');
        const startCounter = (box) => {
            const counter = box.querySelector('.counter');
            const target = +box.getAttribute('data-target') || 0;
            let count = 0;
            const increment = Math.ceil(target / 100);
            const update = () => {
                if (count < target) {
                    count += increment;
                    counter.textContent = Math.min(count, target);
                    requestAnimationFrame(update);
                } else counter.textContent = target;
            };
            update();
        };

        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounter(entry.target);
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        boxes.forEach(b => observer.observe(b));

        /*--------------------------------------
            Footer Year
        --------------------------------------*/
        const yearEl = document.getElementById('year');
        if (yearEl) yearEl.textContent = new Date().getFullYear();
    });

    /*--------------------------------------
        Mobile Menu (Slide Panels)
    --------------------------------------*/
    (function () {
        const openBtn = document.getElementById('openMenu');
        const closeBtn = document.getElementById('closeMenu');
        const overlay = document.getElementById('overlay');
        const mobmenu = document.getElementById('main-menu');
        if (!openBtn || !mobmenu) return;

        const panels = Array.from(mobmenu.querySelectorAll('.panel'));
        let stack = [0];

        function updatePanels() {
            const active = stack[stack.length - 1];
            panels.forEach(p => {
                const idx = Number(p.dataset.index);
                p.style.transform = `translateX(${(idx - active) * 100}%)`;
                p.setAttribute('aria-hidden', idx === active ? 'false' : 'true');
            });
        }

        openBtn.addEventListener('click', () => {
            mobmenu.classList.add('open');
            overlay.classList.add('open');
        });
        closeBtn.addEventListener('click', () => {
            mobmenu.classList.remove('open');
            overlay.classList.remove('open');
            stack = [0];
            updatePanels();
        });
        overlay.addEventListener('click', () => closeBtn.click());

        mobmenu.addEventListener('click', (e) => {
            const sub = e.target.closest('.has-sub');
            if (sub) {
                e.preventDefault();
                const idx = Number(sub.dataset.sub);
                stack.push(idx);
                updatePanels();
            }

            const back = e.target.closest('[data-back]');
            if (back) {
                const to = Number(back.dataset.back);
                stack = [to];
                updatePanels();
            }
        });

        updatePanels();
    })();

    /*--------------------------------------
        Owl Carousels
    --------------------------------------*/
    if ($.isFunction($.fn.owlCarousel)) {
        $('.logodata').owlCarousel({ loop: true, autoplay: true, responsive: { 0: { items: 1 }, 480: { items: 2 }, 800: { items: 3 }, 1000: { items: 4 }, 1400: { items: 5 } } });

        $('.gifts-slids').owlCarousel({ loop: true, nav: true, autoplay: true, navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"], responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 3 }, 1200: { items: 4 } } });

        $('.child-sponsor-slide').owlCarousel({ loop: true, nav: true, autoplay: true, navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"], responsive: { 0: { items: 1 }, 600: { items: 2 }, 1200: { items: 3 } } });

        $('.see-impact-slids').owlCarousel({ loop: true, nav: true, autoplay: true, navText: ["<i class='fa-solid fa-angle-left'></i>", "<i class='fa-solid fa-angle-right'></i>"], responsive: { 0: { items: 1 }, 600: { items: 1 }, 1000: { items: 2 }, 1200: { items: 3 } } });
    }

    /*--------------------------------------
        Mobile Nav (Old System)
    --------------------------------------*/
    $('.mobile-nav .menu-item-has-children').on('click', function () {
        $(this).toggleClass('active');
    });
    $('#nav-icon4, .bar-menu').on('click', function () {
        $('#mobile-nav').toggleClass('open hmburger-menu').show();
    });
    $('#res-cross').on('click', function () {
        $('#mobile-nav').removeClass('open');
    });

    /*--------------------------------------
        Slick Sliders
    --------------------------------------*/
    if ($.isFunction($.fn.slick)) {
        $('.slider-for').slick({ slidesToShow: 1, arrows: false, fade: true, asNavFor: '.slider-nav' });
        $('.slider-nav').slick({ slidesToShow: 5, asNavFor: '.slider-for', focusOnSelect: true });

        $('.slider-for-two').slick({ slidesToShow: 1, fade: true, asNavFor: '.slider-nav-two' });
        $('.slider-nav-two').slick({ slidesToShow: 5, asNavFor: '.slider-for-two', focusOnSelect: true });
    }

    /*--------------------------------------
        Zoom Slider
    --------------------------------------*/
    if ($.isFunction($.fn.owlCarousel)) {
        const $zoom = $('.zoom-slider');
        $zoom.children().each(function (i) { $(this).attr('data-position', i); });
        $zoom.owlCarousel({ center: true, loop: true, autoplay: true, dots: true, responsive: { 0: { items: 1 }, 600: { items: 1 }, 1200: { items: 3 } } });
    }

    /*--------------------------------------
        Project Today
    --------------------------------------*/
    if ($('.project-today')[0] && $.isFunction($.fn.owlCarousel)) {
        const $p = $('.project-today');
        $p.children().each(function (i) { $(this).attr('data-position', i); });
        $p.owlCarousel({ center: true, loop: true, autoplay: true, responsive: { 0: { items: 1 }, 1201: { items: 3 } } });
    }

    /*--------------------------------------
        Accordion
    --------------------------------------*/
    $('.accordion-item .heading').on('click', function (e) {
        e.preventDefault();
        const item = $(this).closest('.accordion-item');
        if (!item.hasClass('active')) $('.accordion-item').removeClass('active').find('.content').slideUp();
        item.toggleClass('active');
        item.find('.content').slideToggle();
    });

    /*--------------------------------------
        Progressbar
    --------------------------------------*/
    function animateElements() {
        $('.progressbar').each(function () {
            const el = $(this);
            const percent = el.find('.circle').attr('data-percent');
            if (!el.data('animate') && el.offset().top < $(window).scrollTop() + $(window).height() - 10) {
                el.data('animate', true);
                el.find('.circle').circleProgress({
                    startAngle: -Math.PI / 2,
                    value: percent / 100,
                    size: 200,
                    thickness: 6,
                    fill: { color: '#ff3636' }
                }).on('circle-animation-progress', function (e, p, step) {
                    $(this).find('div').text((step * 100).toFixed() + "%");
                });
            }
        });
    }
    animateElements();
    $(window).scroll(animateElements);

    /*--------------------------------------
        Product Gallery
    --------------------------------------*/
    $('.li-pd-imgs').on('click', function () {
        $('.li-pd-imgs.nav-active').removeClass('nav-active');
        $(this).addClass('nav-active');
        $('.pd-main-img img').attr('src', $(this).find('img').attr('src'));
    });

    /*--------------------------------------
        Cart Popup
    --------------------------------------*/
    $('.pr-cart').on('click', function () {
        $('.cart-popup').toggleClass('show-cart');
    });

    /*--------------------------------------
        Donation Amount
    --------------------------------------*/
    $('.donating').on('click', function () {
        const amount = $(this).children('span').text();
        $('.donated_amount').attr('placeholder', amount);
    });

    /*--------------------------------------
        Preloader
    --------------------------------------*/
    $(window).on('load', function () {
        $('body').addClass('page-loaded');
    });

    /*--------------------------------------
        Back To Top
    --------------------------------------*/
    const btn = $('#button');
    $(window).scroll(function () {
        btn.toggleClass('show', $(window).scrollTop() > 300);
    });
    btn.on('click', function (e) {
        e.preventDefault();
        $('html, body').animate({ scrollTop: 0 }, 300);
    });

    /*--------------------------------------
        Theme Toggle
    --------------------------------------*/
    let mode = localStorage.getItem('drak-mode');
    const icon = document.querySelector('#theme-icon');

    const enable = () => {
        document.body.classList.add('drak-mode');
        localStorage.setItem('drak-mode', 'enabled');
        if (icon) icon.src = 'assets/img/moon.png';
    };
    const disable = () => {
        document.body.classList.remove('drak-mode');
        localStorage.setItem('drak-mode', null);
        if (icon) icon.src = 'assets/img/sun.png';
    };

    if (mode === 'enabled') enable();

    if (icon) icon.addEventListener('click', () => {
        mode = localStorage.getItem('drak-mode');
        mode !== 'enabled' ? enable() : disable();
    });

})(jQuery);

/*--------------------------------------
    filter 
--------------------------------------*/

    const buttons = document.querySelectorAll(".filter-btn");
    const cards   = document.querySelectorAll(".card");

buttons.forEach(btn => {
        btn.addEventListener("click", () => {

            // remove active from all
            buttons.forEach(b => b.classList.remove("active"));
            btn.classList.add("active");

            const filter = btn.dataset.filter;

            cards.forEach(card => {
                if (filter === "all") {
                    card.style.display = "block";
                } else {
                    card.style.display =
                        card.dataset.type === filter ? "block" : "none";
                }
            });

            // Random filter special behavior
            if (filter === "random") {
                cards.forEach(card => card.style.display = "none");
                const randomCard = cards[Math.floor(Math.random() * cards.length)];
                randomCard.style.display = "block";
            }
        });
});



//tab
document.querySelectorAll(".tabs-menu button").forEach(btn => {
    btn.addEventListener("click", () => {
        // remove active buttons
        document.querySelectorAll(".tabs-menu button").forEach(b => b.classList.remove("active"));
        btn.classList.add("active");

        // hide all panes
        document.querySelectorAll(".tab-pane").forEach(p => p.classList.remove("active"));

        // show selected pane
        document.getElementById(btn.dataset.tab).classList.add("active");
    });
});

//login
$(document).ready(function () {
    $("[data-fancybox]").fancybox({
        touch: false,
        smallBtn: true,
        toolbar: false
    });
});
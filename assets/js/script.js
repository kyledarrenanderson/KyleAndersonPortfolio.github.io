const toggleSwitch = document.getElementById("theme-toggle");

const sunIcon = document.querySelector('.sun-icon');
const moonIcon = document.querySelector('.moon-icon');

function setThemeFromLocalStorage() {
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('darkMode');
        document.body.classList.remove('lightMode');
        toggleSwitch.checked = true;

        sunIcon.classList.remove('visible');
        moonIcon.classList.add('visible');
        sunIcon.classList.add('fade-out');
        moonIcon.classList.remove('fade-out');
    } else {
        document.body.classList.add('lightMode');
        document.body.classList.remove('darkMode');
        toggleSwitch.checked = false;

        sunIcon.classList.add('visible');
        moonIcon.classList.remove('visible');
        sunIcon.classList.remove('fade-out');
        moonIcon.classList.add('fade-out');
    }
}

setThemeFromLocalStorage();

toggleSwitch.addEventListener("change", function () {
    if (this.checked) {
        document.body.classList.remove('lightMode');
        document.body.classList.add('darkMode');
        localStorage.setItem('theme', 'dark');

        sunIcon.classList.remove('visible');
        moonIcon.classList.add('visible');
        sunIcon.classList.add('fade-out');
        moonIcon.classList.remove('fade-out');
    } else {
        document.body.classList.remove('darkMode');
        document.body.classList.add('lightMode');
        localStorage.setItem('theme', 'light');

        sunIcon.classList.add('visible');
        moonIcon.classList.remove('visible');
        sunIcon.classList.remove('fade-out');
        moonIcon.classList.add('fade-out');
    }
});

function adjustBodyPadding() {
    const navbarHeight = document.querySelector('.navbar').offsetHeight;
    document.body.style.paddingTop = navbarHeight + 'px';
}

window.addEventListener('load', adjustBodyPadding);
window.addEventListener('resize', adjustBodyPadding);

window.addEventListener('load', function () {
    document.querySelector('.navbar').classList.add('navbar-slide-in');
});

window.addEventListener('load', function () {
    const navbarLinks = document.querySelectorAll('.navbar a');

    const currentPage = window.location.pathname;

    navbarLinks.forEach(link => {
        if (link.href.includes(currentPage)) {
            link.classList.add('active');
        }
    });
});

window.addEventListener('load', function() {
    document.body.classList.add('loaded');
});

document.addEventListener('DOMContentLoaded', function() {
    const carousels = document.querySelectorAll('.carousel-container');

    carousels.forEach(carousel => {
        const slides = carousel.querySelectorAll('.carousel-slide');
        const dots = carousel.querySelectorAll('.carousel-dot');
        const prevBtn = carousel.querySelector('.carousel-prev');
        const nextBtn = carousel.querySelector('.carousel-next');
        let currentSlide = 0;
        let slideInterval;

        function showSlide(n) {
            // Handle edge cases
            if (slides.length === 0) return;

            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));

            currentSlide = (n + slides.length) % slides.length;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                showSlide(currentSlide - 1);
                resetInterval();
            });
        }

        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                showSlide(currentSlide + 1);
                resetInterval();
            });
        }

        dots.forEach((dot, index) => {
            dot.addEventListener('click', () => {
                showSlide(index);
                resetInterval();
            });
        });

        function startSlideshow() {
            if (slides.length <= 1) return;
            slideInterval = setInterval(() => {
                showSlide(currentSlide + 1);
            }, 5000);
        }

        function resetInterval() {
            clearInterval(slideInterval);
            startSlideshow();
        }

        // Start the slideshow
        showSlide(0);
        startSlideshow();
    });
});
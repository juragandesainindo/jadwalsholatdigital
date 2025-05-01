document.addEventListener("DOMContentLoaded", function () {
    let currentIndex = 0;
    const slides = document.querySelectorAll(".slide");
    const totalSlides = slides.length;
    const slider = document.querySelector(".slider");

    // Ambil nilai interval dari data-attribute
    const slideContainer = document.querySelector(".topbar");
    let slideInterval = slideContainer.getAttribute("data-interval") || 5000; // Default 30 detik

    function updateSlider() {
        slider.style.transition = "transform 0.5s ease-in-out";
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;
    }

    function nextSlide() {
        currentIndex++;
        updateSlider();
    }

    slider.addEventListener("transitionend", function () {
        if (currentIndex === totalSlides - 1) {
            slider.style.transition = "none";
            currentIndex = 0;
            slider.style.transform = `translateX(0)`;

            setTimeout(() => {
                slider.style.transition = "transform 0.5s ease-in-out";
            }, 10);
        }
    });

    setInterval(nextSlide, slideInterval);
});

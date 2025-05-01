document.addEventListener('DOMContentLoaded', function () {
    const slider = document.querySelector('#myCustomSlider');
    const items = slider.querySelectorAll('.slider-item');
    let currentIndex = 0;
    let isFade = slider.classList.contains('fade');
    let intervalId;
    const slideInterval = 5000;

    // Nonaktifkan event mouse pada slider
    slider.style.pointerEvents = 'none';

    // Handle remote control navigation
    document.addEventListener('keydown', function (e) {
        switch (e.key) {
            case 'ArrowLeft':
                goToSlide(currentIndex - 1);
                break;
            case 'ArrowRight':
                goToSlide(currentIndex + 1);
                break;
        }
        resetAutoSlide();
    });

    function initSlider() {
        if (!isFade) {
            slider.querySelector('.slider-inner').style.transform = `translateX(-${currentIndex * 100}%)`;
        } else {
            items.forEach((item, index) => {
                item.classList.remove('active');
                if (index === currentIndex) {
                    item.classList.add('active');
                }
            });
        }
        startAutoSlide();
    }

    function goToSlide(index) {
        if (index >= items.length) {
            currentIndex = 0;
        } else if (index < 0) {
            currentIndex = items.length - 1;
        } else {
            currentIndex = index;
        }

        if (!isFade) {
            slider.querySelector('.slider-inner').style.transform = `translateX(-${currentIndex * 100}%)`;
        } else {
            items.forEach((item, idx) => {
                item.classList.remove('active');
                if (idx === currentIndex) {
                    item.classList.add('active');
                }
            });
        }
    }

    function nextSlide() {
        goToSlide(currentIndex + 1);
    }

    function startAutoSlide() {
        intervalId = setInterval(nextSlide, slideInterval);
    }

    function resetAutoSlide() {
        clearInterval(intervalId);
        startAutoSlide();
    }

    slider.addEventListener('mouseenter', () => {
        clearInterval(intervalId);
    });

    slider.addEventListener('mouseleave', () => {
        resetAutoSlide();
    });

    initSlider();
});

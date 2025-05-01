const slides = document.querySelectorAll('.category-slide');
let currentIndex = 0;

function animateVertical(cardSecond, callback) {
    const wrapper = cardSecond.querySelector('.card-vertical-wrapper');
    const items = wrapper.querySelectorAll('.card-detail');
    let index = 0;

    wrapper.style.transform = 'translateY(0)';
    wrapper.style.transition = 'transform 0.6s ease';

    function scrollNext() {
        if (index < items.length) {
            const offset = -index * items[0].offsetHeight;
            wrapper.style.transform = `translateY(${offset}px)`;
            index++;
            setTimeout(scrollNext, 1500);
        } else {
            setTimeout(callback, 1000);
        }
    }

    setTimeout(scrollNext, 700);
}

function showSlide(index) {
    slides.forEach((slide, i) => {
        slide.classList.toggle('active', i === index);
    });
}

function slideLoop() {
    const currentSlide = slides[currentIndex];
    const cardSecond = currentSlide.querySelector('.card-second');

    showSlide(currentIndex);

    if (cardSecond) {
        const wrapper = cardSecond.querySelector('.card-vertical-wrapper');

        wrapper.style.transition = 'none';
        wrapper.style.transform = 'translateY(0)';
        void wrapper.offsetWidth;
        wrapper.style.transition = 'transform 0.6s ease';

        animateVertical(cardSecond, () => {
            if (currentIndex === slides.length - 1) {
                currentIndex = 0;
            } else {
                currentIndex++;
            }
            slideLoop();
        });
    } else {
        setTimeout(() => {
            currentIndex = (currentIndex + 1) % slides.length;
            slideLoop();
        }, 2000);
    }
}

slideLoop();

let currentIndex = 0;
const items = document.querySelectorAll('.carousel-item');
const totalItems = items.length;
// const interval = {{ $interval }}; // Ambil nilai dari controller

function showSlide(index) {
// Hide all slides
items.forEach(item => {
item.classList.remove('active');
});

// Show the current slide
items[index].classList.add('active');
}

function moveSlide(step) {
// Update index
currentIndex = (currentIndex + step + totalItems) % totalItems;

// Show the new slide
showSlide(currentIndex);
}

// Initialize the first slide
showSlide(currentIndex);

// Auto slide every 5 seconds
setInterval(() => {
moveSlide(1);
}, 5000);
const $carousel = $(".carousel");
const $slides = $(".carousel-slide");
let currentIndex = 0;

function showSlide(index) {
    if (index < 0) {
        currentIndex = $slides.length - 1;
    } else if (index >= $slides.length) {
        currentIndex = 0;
    }

    $carousel.css("transform", `translateX(-${currentIndex * 100}%)`);
}

if ($nextButton.length && $prevButton.length) {
    $nextButton.click(function() {
        currentIndex++;
        showSlide(currentIndex);
    });

    $prevButton.click(function() {
        currentIndex--;
        showSlide(currentIndex);
    });
}

const autoAdvanceInterval = 3000; // Change slide every 3 seconds

setInterval(function() {
    currentIndex++;
    showSlide(currentIndex);
}, autoAdvanceInterval);


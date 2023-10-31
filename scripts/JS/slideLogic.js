let slideIndex = 0;

function showSlide(n) {
    const slides = document.getElementsByClassName("slide");
    
    if (n < 0) {
        slideIndex = slides.length - 1;
    } else if (n >= slides.length) {
        slideIndex = 0;
    }

    // const translateX = -slideIndex * slideWidth;
    // slidesWrapper.style.transform = `translateX(${translateX}px)`;
    
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
        // slides[i].style.transform = `translateX(${100 * (i - slideIndex)}%)`; // Slide the current slide into view
    }
    
    slides[slideIndex].style.display = "block";
}




function nextSlide() {
    slideIndex++;
    showSlide(slideIndex);
}

function prevSlide() {
    slideIndex--;
    showSlide(slideIndex);
}

// Automatically advance the slideshow (optional)
function autoSlide() {
    nextSlide();
    setTimeout(autoSlide, 5000); // Change slide every 5 seconds
}

showSlide(slideIndex);
autoSlide(); // Uncomment this line to enable automatic slideshow

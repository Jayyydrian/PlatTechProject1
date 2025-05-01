document.addEventListener("DOMContentLoaded", function() {
  const slides = document.querySelector(".announcement-slides");
  const slideItems = document.querySelectorAll(".announcement-slide");
  const prevArrow = document.querySelector(".arrow-prev");
  const nextArrow = document.querySelector(".arrow-next");

  let currentIndex = 0;
  const totalSlides = slideItems.length;

  function updateSlidePosition() {
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  function showNextSlide() {
    currentIndex = (currentIndex + 1) % totalSlides;
    updateSlidePosition();
  }

  function showPrevSlide() {
    currentIndex = (currentIndex - 1 + totalSlides) % totalSlides;
    updateSlidePosition();
  }

  nextArrow.addEventListener("click", showNextSlide);
  prevArrow.addEventListener("click", showPrevSlide);

  // Auto slide every 4 seconds
  setInterval(showNextSlide, 4000);
});

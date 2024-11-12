let slideIndex = 0;

function gotoStart() {
    slideIndex = 0;

    showSlides();
}

function gotoEnd(className) {
    if (!className)
        className = 'slide';

    let slides = document.getElementsByClassName(className);

    if (!slides || (slides.length < 1))
        return;

    slideIndex = slides.length - 1;

  showSlides();
}

function incrementIndex(className) {
    if (!className)
        className = 'slide';

    let slides = document.getElementsByClassName(className);

    if (!slides || (slides.length < 1))
        return;

    slideIndex++;

    if (slideIndex >= slides.length)
        slideIndex = 0;

  showSlides();
}

function decrementIndex() {
    slideIndex--;

    if (slideIndex < 0)
        slideIndex = 0;

  showSlides();
}

function showSlides(className, interval) {
    if (!className)
        className = 'slide';

    let slides = document.getElementsByClassName(className);

    if (!slides || (slides.length < 1))
        return;

    if (!interval)
        interval = 10;

    for (let i = 0; i < slides.length; i++)
        slides[i].style.display = "none";

    slides[slideIndex].style.display = "block";

    slideIndex++;

    if (slideIndex >= slides.length)
        slideIndex = 0;
}

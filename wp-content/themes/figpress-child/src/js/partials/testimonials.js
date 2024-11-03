const Flickity = require('flickity-as-nav-for');

let sliderContent = document.querySelectorAll('.testimonial-container');

sliderContent.forEach(content => {
  let flkty = new Flickity(content, {
    prevNextButtons: false,
    contain: true,
    wrapAround: true,
    pageDots: true
  });
});

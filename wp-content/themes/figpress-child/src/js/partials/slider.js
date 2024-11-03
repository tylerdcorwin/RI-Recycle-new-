const Flickity = require('flickity-as-nav-for');

let sliderNav = document.querySelectorAll('.slider-nav-container');
let sliderContent = document.querySelectorAll('.slider-container');

sliderContent.forEach(content => {
  let flkty = new Flickity(content, {
    cellAlign: 'left',
    wrapAround: true,
    pageDots: true
  });
});

sliderNav.forEach(nav => {
  let flkty = new Flickity(nav, {
    cellAlign: 'left',
    pageDots: true,
    wrapAround: true,
    asNavFor: document.querySelector('.slider-container')
  });
});

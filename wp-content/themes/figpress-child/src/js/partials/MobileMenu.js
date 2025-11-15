import { fig } from '../simplify.js';

const navMenu = document.querySelector('header.navigation');
const burger = document.querySelector('.burger');
const logo = document.querySelector('.main-logo');
const logoSrc = logo.src;
const inverseLogo = logo.dataset.inverse;
const pageUpBtn = document.getElementById('back-to-top');
const scrollUpBtnCon = document.querySelector('.scroll-up-btn');
const footer = document.querySelector('.footer-con');
const footerTop = footer.getBoundingClientRect().top;
const windowHeight = window.innerHeight;


if ( burger ) {
  document.querySelector('.burger').addEventListener('click', (e) => {
    document.querySelector('.burger').classList.toggle('active');
    document.querySelector('.mobile-menu').classList.toggle('active');
    document.querySelector('.menu').classList.toggle('active');
  });
}


const checkForHeader = () => {
  // if user has scrolled any
  let scrollPos = window.scrollY;
  if( window.pageYOffset > 45) {
    pageUpBtn.classList.add('active');
    scrollUpBtnCon.classList.add('active');
  } else {
    pageUpBtn.classList.remove('active');
    scrollUpBtnCon.classList.remove('active');
  }

  const footerTop = footer.getBoundingClientRect().top;
  const windowHeight = window.innerHeight;

  if (footerTop <= windowHeight) {
    pageUpBtn.classList.remove("active");
    scrollUpBtnCon.classList.remove('active');
  }
}

window.onscroll = checkForHeader;

if ( pageUpBtn ) {
  fig.addCustomEvent(pageUpBtn, 'click', (e) => {
    e.preventDefault
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    })
  })
}

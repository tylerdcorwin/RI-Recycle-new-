const navMenu = document.querySelector('header.navigation');
const burger = document.querySelector('.burger');
const logo = document.querySelector('.main-logo');
const logoSrc = logo.src;
const inverseLogo = logo.dataset.inverse;

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
    navMenu.classList.add('active');
    logo.src = inverseLogo;
  } else {
    navMenu.classList.remove('active');
    logo.src = logoSrc;
  }
}

window.onscroll = checkForHeader;

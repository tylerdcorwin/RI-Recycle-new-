import {fig} from '../simplify.js';

let mainNav = document.querySelector('header.navigation');
let alertBar = document.querySelector('.alert-bar');

if ( alertBar ) {
  if ( getCookie('banner') ) {
    alertBar.classList.add('no-show');
  }

  let closeBanner = document.querySelector('.close-banner');
  fig.addCustomEvent(closeBanner, 'click', () => {
    createCookie('banner');
    alertBar.classList.add('no-show');
    mainNav.classList.remove('alert-bar-active');
  });

}

function createCookie(name, days = 7) {
  let d = new Date();
  d.setTime( d.getTime() + (days * 24 * 60 * 60 * 1000) );
  let expiration = "expires=" + d.toUTCString();
  document.cookie = `${name}'=show'`; + expiration + ";path=/";
}

function getCookie(cookieName) {
  let name = cookieName + '=';
  let decodedCookie = decodeURIComponent(document.cookie);
  let cookieArray = decodedCookie.split(';');
  for ( let i = 0; i < cookieArray.length; i++ ) {
    let cookie = cookieArray[i];
    while ( cookie.charAt(0) == ' ') {
      cookie = cookie.substring(1);
    }
    if ( cookie.indexOf(cookieName) === 0 ) {
      return true;
    }
  }
  return false;
}

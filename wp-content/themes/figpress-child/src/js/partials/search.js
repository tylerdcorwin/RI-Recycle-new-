import {fig} from '../simplify.js';

let headerSearch = document.querySelector('.icon-search');
let headerSearchBar = document.querySelector('.search-bar');

fig.addCustomEvent( headerSearch, 'click', (e) => {
  headerSearchBar.classList.toggle('active');
})

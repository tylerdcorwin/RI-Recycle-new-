let wrapper = document.querySelector('.wrapper');
let mainNav = document.querySelector('header.navigation');
if (wrapper) {
  let navOffset = mainNav ? mainNav.offsetHeight : 0;
  wrapper.style.paddingTop = navOffset + 'px';
}

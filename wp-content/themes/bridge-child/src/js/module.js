let wrapper = document.querySelector('.custom-wrapper');
let mainNav = document.querySelector('header');
if (wrapper) {
  let navOffset = mainNav ? mainNav.offsetHeight : 0;
  wrapper.style.paddingTop = navOffset + 'px';
}

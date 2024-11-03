const dropdown = document.querySelector('.category-select');
dropdown.addEventListener('change', () => {
  const elem = document.querySelector('.postform');
  const value = elem.options[elem.selectedIndex].text;
  if (value === 'All') {
    window.location.pathname = '/blog/';
  } else {
    document.querySelector('.category-select').submit();
  }
});

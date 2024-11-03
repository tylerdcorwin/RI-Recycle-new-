import {fig} from '../simplify.js';
const figAnchorLinks = document.querySelectorAll('a[href*="#"]');

fig.addLoopedFunction(figAnchorLinks, 'click', handleScroll);

function handleScroll(e) {
  e.preventDefault();
  const scrollElemId = e.target.href.split('#')[1];
  const scrollEndElem = document.getElementById(scrollElemId);

  requestAnimationFrame(timestamp => {
    const stamp = timestamp || new Date().getTime();
    const duration = 1000;
    const start = stamp;

    const startScrollOffset = window.pageYOffset;
    const scrollEndElemTop = scrollEndElem.getBoundingClientRect().top - 100;

    scrollToElem(start, stamp, duration, scrollEndElemTop, startScrollOffset);
  });
}

const scrollToElem = (
  startTime,
  currentTime,
  duration,
  scrollEndElemTop,
  startScrollOffset
) => {
  const runtime = currentTime - startTime;
  let progress = runtime / duration;

  progress = Math.min(progress, 1);

  window.scroll(0, startScrollOffset + scrollEndElemTop * progress);
  if (runtime < duration) {
    requestAnimationFrame(timestamp => {
      const currentTime = timestamp || new Date().getTime();
      scrollToElem(
        startTime,
        currentTime,
        duration,
        scrollEndElemTop,
        startScrollOffset
      );
    });
  }
};

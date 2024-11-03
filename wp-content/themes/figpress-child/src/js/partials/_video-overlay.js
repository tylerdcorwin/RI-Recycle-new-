// Video Overlay
import {fig} from '../simplify.js';

let ambientHero = document.querySelector('.hero-callout-wrap');

if ( ambientHero ) {
  let ambientUrl    = ambientHero.dataset.ambientVideo;
  let ambientPlayer = document.querySelector('.ambient-vid');

  if ( ambientUrl && window.innerWidth > 750 ) {
    ambientHero.classList.add('active');
    ambientPlayer.classList.add('active');
    ambientPlayer.innerHTML = '<video muted autoplay loop><source src="' + ambientUrl +'" type="video/mp4"></source></video>'
  }
}

fig.addLoopedFunction( document.querySelectorAll('.play-video-homepage'), 'click', (e) => {
  document.querySelector('.modal-con').classList.add('active');
  document.querySelector('.embed-container').innerHTML = '';
  let videoSource = e.target.getAttribute('data-video-source');
  fig.checkAndAddVideo( document.querySelector('.embed-container'), videoSource );
});

fig.addCustomEvent( document.querySelector('.modal-con'), 'click', () => {
  let modalContent = document.querySelector('.modal-content');
  if ( modalContent.classList.contains('active-image') ) {
    modalContent.classList.remove('active-image');
  }
  document.querySelector('.modal-con').classList.remove('active');
  document.querySelector('.embed-container').innerHTML = '';
});

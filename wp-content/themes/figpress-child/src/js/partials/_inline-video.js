import {fig} from '../simplify.js';

const inlineVideoPlay = document.querySelectorAll('.inline-play-btn');

fig.addLoopedFunction( inlineVideoPlay, 'click', (e) => {
  let vidSrc = e.target.getAttribute('data-video-url');
  let vidCon = e.target.closest('.inner-video-player');
  fig.checkAndAddVideo( vidCon, vidSrc );
});

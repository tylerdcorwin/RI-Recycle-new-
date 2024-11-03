import {fig} from '../simplify.js';


fig.addCustomEvent( document.querySelector('.play-video'), 'click', (e) => {
  document.querySelector('.modal-con').classList.add('active');
  document.querySelector('.embed-container').innerHTML = '';
  const videoSource = e.target.getAttribute('data-video-source');
  let videoEmbed;

  if( videoSource.includes('youtu') ) {
    let ytRegExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/,
          match = videoSource.match(ytRegExp),
          src = match[2],
          videoEmbed = 'https://youtube.com/embed/' + src;
          addVideoToModal(videoEmbed);
  } else if ( videoSource.includes('vimeo') ) {
    let vimeoRegExp = /http(s)?:\/\/(www\.)?vimeo.com\/(\d+)(\/)?(#.*)?/,
          match = videoSource.match(vimeoRegExp),
          src = match[3],
          videoEmbed = 'https://player.vimeo.com/video/' + src;
          addVideoToModal(videoEmbed);
  }
});

fig.addCustomEvent( document.querySelector('.modal-con'), 'click', () => {
  document.querySelector('.modal-con').classList.remove('active');
  document.querySelector('.embed-container').innerHTML = '';
});

function addVideoToModal(videoEmbed) {
  document.querySelector('.embed-container').innerHTML = '<iframe allow="autoplay" src="' + videoEmbed + '?title=0&autoplay=1&byline=0"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
}

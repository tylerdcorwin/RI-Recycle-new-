export const fig = {
  addCustomEvent(element, eventType, eventFunction) {
    if( element ) {
      element.addEventListener(eventType, eventFunction);
    }
  },
  addLoopedFunction(elements, eventTypes, eventFunctions) {
    if ( elements ) {
      elements.forEach(element => {
        element.addEventListener(eventTypes, eventFunctions);
      });
    }
  },
  addLoopedEscape(activeElements) {
    if ( activeElements ) {
      activeElements.forEach(element => {
        element.classList.remove('active');
      });
    }
  },
  checkAndAddVideo(element, videoSource) {
    let videoEmbed;
    if( videoSource.includes('youtu') ) {
      let ytRegExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/,
            match = videoSource.match(ytRegExp),
            src = match[2],
            videoEmbed = 'https://youtube.com/embed/' + src;
            // console.log(videoEmbed);
      this.addVideoToSection(element, videoEmbed);
    } else if ( videoSource.includes('vimeo') ) {
      let vimeoRegExp = /http(s)?:\/\/(www\.)?vimeo.com\/(\d+)(\/)?(#.*)?/,
            match = videoSource.match(vimeoRegExp),
            src = match[3],
            videoEmbed = 'https://player.vimeo.com/video/' + src;
      this.addVideoToSection(element, videoEmbed);
    }
  },
  addVideoToSection(element, videoEmbed) {
    element.innerHTML += '<iframe allow="autoplay" src="' + videoEmbed + '?title=0&autoplay=1&byline=0"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
  },
  saveCookie(cookieName, cookieValue) {
    // NOTE: in order to test locally, you need to remove the domain value
    document.cookie = `${cookieName} = ${cookieValue}; domain=${ROOTURL}; max-age=604800; path=/`;
  },
  checkCookie(cookieName, cookieValue) {
    if ( !document.cookie.split(';').filter((item) => item.includes(`${cookieName}=${cookieValue}`)).length ) {
      return false;
    } else {
      return true;
    }
  }
}

export function debounced(delay, fn) {
  let timerId;
  return function (...args) {
    if (timerId) {
      clearTimeout(timerId);
    }
    timerId = setTimeout(() => {
      fn(...args);
      timerId = null;
    }, delay);
  }
}

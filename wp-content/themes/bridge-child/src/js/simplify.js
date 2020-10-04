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

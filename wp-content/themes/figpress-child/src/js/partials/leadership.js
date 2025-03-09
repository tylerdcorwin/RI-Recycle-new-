import {fig} from '../simplify.js';

fig.addLoopedFunction( document.querySelectorAll('.open-bio'), 'click', (e) => {
  let leaderButton = e.target.getAttribute('data-bio');
  document.querySelector(`.leader-bio[data-open='${leaderButton}']`).classList.add('active');
});

fig.addLoopedFunction( document.querySelectorAll('.leader-bio'), 'click', (e) => {
  e.target.classList.remove('active');
})

fig.addLoopedFunction( document.querySelectorAll('.leader-bio .close-bio'), 'click', (e) => {
  e.target.closest('.leader-bio').classList.remove('active');
})

// Add Escape key event
document.addEventListener('keydown', (e) => {
  if (e.key === 'Escape') {
    fig.addLoopedEscape(document.querySelectorAll('.leader-bio.active'));
    document.querySelector('.modal-con').classList.remove('active');
    document.querySelector('.embed-container').innerHTML = '';
  }
});

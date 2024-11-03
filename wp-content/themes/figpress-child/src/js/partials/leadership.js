import {fig} from '../simplify.js';

fig.addLoopedFunction( document.querySelectorAll('.open-bio'), 'click', (e) => {
  let leaderButton = e.target.getAttribute('data-bio');
  console.log(leaderButton);
  document.querySelector(`.leader-bio[data-open='${leaderButton}']`).classList.add('active');
});

fig.addLoopedFunction( document.querySelectorAll('.leader-bio'), 'click', (e) => {
  e.target.classList.remove('active');
})

fig.addLoopedFunction( document.querySelectorAll('.leader-bio .close-bio'), 'click', (e) => {
  e.target.closest('.leader-bio').classList.remove('active');
})

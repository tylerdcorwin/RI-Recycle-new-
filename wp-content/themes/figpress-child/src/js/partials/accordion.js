import {fig} from '../simplify.js';

const figAccordion = document.querySelectorAll('.accordion-title');

fig.addLoopedFunction(figAccordion, 'click', (e) => {
  e.target.closest('.accordion-tab').classList.toggle('active-tab');
});

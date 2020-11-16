import {fig} from '../simplify.js';

let choices = document.querySelectorAll('.indiv-choice');
let schoolCard = document.querySelector('.school-choice');
let enrollCard = document.querySelector('.enrollment');
let resultsCard = document.querySelector('.results');
let goBack = document.querySelector('.calc-card .prev-btn');
let enrollmentForm = document.querySelector('.enrollment-form');
let estimateBtn = document.querySelector('.calc-card .next-btn');
let startOver = document.querySelector('.start-over');
let backToEnroll = document.querySelector('.back-to-enrollment');


fig.addLoopedFunction(choices, 'click', () => {
  schoolCard.classList.remove('active');
  enrollCard.classList.add('active');
});

fig.addCustomEvent(goBack, 'click', () => {
  enrollCard.classList.remove('active');
  schoolCard.classList.add('active');
});

fig.addCustomEvent(enrollmentForm, 'submit', (e) => {
  e.preventDefault();
  enrollCard.classList.remove('active');
  resultsCard.classList.add('active');
});

fig.addCustomEvent(estimateBtn, 'click', () => {
  enrollCard.classList.remove('active');
  resultsCard.classList.add('active');
});

fig.addCustomEvent(backToEnroll, 'click', () => {
  resultsCard.classList.remove('active');
  enrollCard.classList.add('active');
});

fig.addCustomEvent(startOver, 'click', () => {
  window.location.reload();
});

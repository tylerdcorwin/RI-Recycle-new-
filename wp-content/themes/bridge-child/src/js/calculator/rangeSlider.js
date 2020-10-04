// import {fig} from '../simplify.js';

let elementarySlider = document.getElementById("elementary-range");
let elementaryBullet = document.getElementById("elementary-rs-bullet");
let middleSlider = document.getElementById("middle-range");
let middleBullet = document.getElementById("middle-rs-bullet");
let highSlider = document.getElementById("high-range");
let highBullet = document.getElementById("high-rs-bullet");

elementarySlider.addEventListener("input", showElementaryValue, false);
middleSlider.addEventListener("input", showMiddleValue, false);
highSlider.addEventListener("input", showHighValue, false);

function showElementaryValue() {
  elementaryBullet.innerHTML =  elementarySlider.value;
  let bulletPosition = ( elementarySlider.value / elementarySlider.max);
  let widthOfSlider =  elementarySlider.offsetWidth;
  elementaryBullet.style.left = (bulletPosition * widthOfSlider) + "px";
}

function showMiddleValue() {
  middleBullet.innerHTML =  middleSlider.value;
  let bulletPosition = ( middleSlider.value / middleSlider.max);
  let widthOfSlider =  middleSlider.offsetWidth;
  middleBullet.style.left = (bulletPosition * widthOfSlider) + "px";
}

function showHighValue() {
  highBullet.innerHTML =  highSlider.value;
  let bulletPosition = ( highSlider.value / highSlider.max);
  let widthOfSlider =  highSlider.offsetWidth;
  highBullet.style.left = (bulletPosition * widthOfSlider) + "px";
}

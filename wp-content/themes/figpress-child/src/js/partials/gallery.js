import { fig } from '../simplify.js';
import { lightbox } from './lightbox.js';

let galleryImages = document.querySelectorAll('.indiv-gallery-item');
let lightboxContainer = document.querySelector('.lightbox-con');
let imageCon;

fig.addLoopedFunction(galleryImages, 'click', e => {
  imageCon = e.target.closest('.gallery-con');
  let allGalleryItems = imageCon.querySelectorAll('.indiv-gallery-item');
  let imgArray = [];
  for (let i = 0; i < allGalleryItems.length; i++) {
    imgArray.push(allGalleryItems[i].getAttribute('data-gallery'));
  }
  let imageNumClicked = e.target.getAttribute('data-count');
  lightbox.createLightbox(imgArray, imageNumClicked, imageCon);
});


if ( lightboxContainer ) {
  fig.addCustomEvent(
    lightboxContainer.querySelector('.prev-arrow'),
    'click',
    e => {
      let index = e.target.getAttribute('data-prev');
      lightbox.setup(index, imageCon);
    }
  );

  fig.addCustomEvent(
    lightboxContainer.querySelector('.next-arrow'),
    'click',
    e => {
      let index = e.target.getAttribute('data-next');
      lightbox.setup(index, imageCon);
    }
  );

  fig.addCustomEvent(
    lightboxContainer.querySelector('.close-lightbox'),
    'click',
    e => {
      lightbox.closeLightbox();
    }
  );
}

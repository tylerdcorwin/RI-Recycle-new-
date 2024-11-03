let lightboxImageArray, lightboxImages, currentActive;
let pageArrows = document.querySelector('.page-arrows');
if ( pageArrows ) {  
  let prevImage = pageArrows.querySelector('.prev-arrow');
  let nextImage = pageArrows.querySelector('.next-arrow');
}

export const lightbox = {
  createLightbox(imageArray, selectedImage, imageCon) {
    lightboxImageArray = imageArray;
    currentActive = selectedImage;
    document.querySelector('.lightbox-con').classList.add('active');
    this.setup(selectedImage, imageCon);
  },
  setup(index, imageCon) {
    lightboxImages = imageCon.querySelectorAll('.lightbox-image');
    let arraySize = lightboxImageArray.length - 1;
    let prev = +index === 0 ? arraySize : +index - 1;
    let next = +index === arraySize ? 0 : +index + 1;

    lightboxImages[prev].className = 'lightbox-image prev';
    lightboxImages[index].className = 'lightbox-image current';
    lightboxImages[next].className = 'lightbox-image next';

    nextImage.setAttribute('data-next', this.checkAndSetNext(index, arraySize));
    prevImage.setAttribute('data-prev', this.checkAndSetPrev(index, arraySize));
  },
  checkAndSetNext(current, max) {
    if (parseInt(current) === max) {
      return 0;
    } else {
      return parseInt(current) + 1;
    }
  },
  checkAndSetPrev(current, max) {
    if (parseInt(current) === 0) {
      return max;
    } else {
      return parseInt(current) - 1;
    }
  },
  closeLightbox() {
    for (const image of lightboxImages) {
      image.className = 'lightbox-image hidden';
    }
    nextImage.setAttribute('data-next', '');
    prevImage.setAttribute('data-prev', '');
    document.querySelector('.lightbox-con').classList.remove('active');
  }
};

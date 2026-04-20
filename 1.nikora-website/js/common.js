// Nikora Corporation - Common JavaScript
// 2008-era rollover and utility functions

// Image rollover swap
function swapImg(imgName, imgSrc) {
  if (document.images) {
    document.images[imgName].src = imgSrc;
  }
}

// Preload images for rollovers
var preloadImages = new Array();
function preloadImg() {
  for (var i = 0; i < arguments.length; i++) {
    preloadImages[i] = new Image();
    preloadImages[i].src = arguments[i];
  }
}

// Window onload
window.onload = function() {
  // Preload rollover images
  preloadImg(
    'img/nav-home-over.svg',
    'img/nav-network-over.svg',
    'img/nav-about-over.svg'
  );
}

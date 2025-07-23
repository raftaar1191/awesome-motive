/******/ (() => { // webpackBootstrap
/*!****************************!*\
  !*** ./src/js/frontend.js ***!
  \****************************/
/**
 * Primary editor script. Imports all of the various features so that they can
 * be bundled into a final file during the build process.
 *
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright Copyright (c) 2023, Justin Tadlock
 * @license   GPL-2.0-or-later
 */

function AM_playVideo() {
  window.open("https://www.youtube.com/watch?v=mUGYPlAgJPw", "_blank");
}

// Wait for DOM to load
document.addEventListener("DOMContentLoaded", function () {
  const thumbnails = document.querySelectorAll(".thumbnail");
  thumbnails.forEach(function (thumb) {
    thumb.addEventListener("click", AM_playVideo);
  });
});
/******/ })()
;
//# sourceMappingURL=frontend.js.map
const video = document.getElementById("hover-video");
// Play video on hover
video.parentElement.addEventListener("mouseenter", function () {
  video.play();
});
// Pause video and store current time on hover out
video.parentElement.addEventListener("mouseleave", function () {
  video.pause();
});
window.onload = function () {
  var video = document.getElementById("hover-video");
  var progressBar = document.getElementById("progress-bar");
  var durationDisplay = document.querySelector(".duration");

  video.addEventListener("timeupdate", function () {
    var percent = (video.currentTime / video.duration) * 100;
    progressBar.style.height = percent + "%";
  });
  video.addEventListener("timeupdate", function () {
    var currentTime = formatTime(video.currentTime);
    var duration = formatTime(video.duration);
    durationDisplay.textContent = currentTime + "/" + duration;
  });

  function formatTime(time) {
    var minutes = Math.floor(time / 60);
    var seconds = Math.floor(time % 60);
    return pad(minutes) + ":" + pad(seconds);
  }

  function pad(number) {
    return (number < 10 ? "0" : "") + number;
  }
};
// owl carousel
let items = document.querySelectorAll(".slider .item");
let next = document.getElementById("next");
let prev = document.getElementById("prev");

let active = 3;
function loadShow() {
  let stt = 0;
  items[active].style.transform = `none`;
  items[active].style.zIndex = 1;
  items[active].style.filter = "none";
  items[active].style.opacity = 1;
  for (var i = active + 1; i < items.length; i++) {
    stt++;
    items[i].style.transform = `translateX(${120 * stt}px) scale(${
      1 - 0.2 * stt
    }) perspective(16px) rotateY(-1deg)`;
    items[i].style.zIndex = -stt;
    items[i].style.filter = "blur(5px)";
    items[i].style.opacity = stt > 2 ? 0 : 0.6;
  }
  stt = 0;
  for (var i = active - 1; i >= 0; i--) {
    stt++;
    items[i].style.transform = `translateX(${-120 * stt}px) scale(${
      1 - 0.2 * stt
    }) perspective(16px) rotateY(1deg)`;
    items[i].style.zIndex = -stt;
    items[i].style.filter = "blur(5px)";
    items[i].style.opacity = stt > 2 ? 0 : 0.6;
  }
}
loadShow();
next.onclick = function () {
  active = active + 1 < items.length ? active + 1 : active;
  loadShow();
};
prev.onclick = function () {
  active = active - 1 >= 0 ? active - 1 : active;
  loadShow();
};

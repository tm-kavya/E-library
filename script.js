const hamburger = document.querySelector(".menu-bar");
const menu = document.querySelector(".side-bar");

hamburger.addEventListener("click", function () {
  if (menu.style.display === "block") {
    menu.style.display = "none";
  } else {
    menu.style.display = "block";
  }
});

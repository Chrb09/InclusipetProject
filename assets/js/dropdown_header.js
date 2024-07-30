const barra__header = document.querySelector(".barra__header");
const dropdown__header = document.querySelector(".dropdown__header");

barra__header.onclick = function () {
  dropdown__header.classList.toggle("open");
};

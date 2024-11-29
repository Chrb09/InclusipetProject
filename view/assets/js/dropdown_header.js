const barra__header = document.querySelector(".barra__header");
const dropdown__header = document.querySelector(".dropdown__header");

barra__header.addEventListener("click", () => {
  dropdown__header.classList.toggle("open");
});

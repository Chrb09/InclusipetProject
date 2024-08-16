let details = document.getElementsByClassName("details");

console.log(details);
for (i = 0; i < details.length; i++) {
  details[i].addEventListener("click", function () {
    this.classList.toggle("open_faq");
  });
}

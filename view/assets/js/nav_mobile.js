let summary = document.getElementsByClassName("summary");

for (i = 0; i < summary.length; i++) {
  summary[i].addEventListener("click", function () {
    this.parentElement.classList.toggle("open_faq");
  });
}

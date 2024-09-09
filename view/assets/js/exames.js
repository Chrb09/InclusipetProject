let summaryExames = document.getElementsByClassName("summary-exame");

for (i = 0; i < summary.length; i++) {
  summaryExames[i].addEventListener("click", function () {
    this.parentElement.classList.toggle("open_faq");
  });
}

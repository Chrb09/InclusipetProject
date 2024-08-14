const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const containerlogin = document.getElementById("container-login");
const signUpForm = document.getElementById("sign-up-form");

signUpButton.addEventListener("click", () => {
  containerlogin.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  containerlogin.classList.remove("right-panel-active");
});

function cadastrarnext() {
  signUpForm.classList.toggle("next");
}

$("#sign-up-cpf").mask("000.000.000-00");
$("#sign-up-cep").mask("00000-000");
$("#sign-up-tel").mask("(00)00000-0000");

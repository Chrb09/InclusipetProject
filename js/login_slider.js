const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const containerlogin = document.getElementById("container-login");

signUpButton.addEventListener("click", () => {
  containerlogin.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  containerlogin.classList.remove("right-panel-active");
});

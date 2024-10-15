const signUpButton = document.getElementById("signUp");
const signInButton = document.getElementById("signIn");
const containerlogin = document.getElementById("container-login");
const signUpForm = document.getElementById("sign-up-form");

const logInEmail = document.getElementById("log-in-email");
const logInPassword = document.getElementById("log-in-password");

const signUpEmail = document.getElementById("sign-up-email");
const signUpPassword = document.getElementById("sign-up-password");
const signUpConfirmPassword = document.getElementById("sign-up-confirm-password");
const signUpName = document.getElementById("sign-up-name");
const signUpDate = document.getElementById("sign-up-date");
const signUpCPF = document.getElementById("sign-up-cpf");
const signUpCEP = document.getElementById("sign-up-cep");
const signUpTelefone = document.getElementById("sign-up-tel");

signUpButton.addEventListener("click", () => {
  containerlogin.classList.add("right-panel-active");
});

signInButton.addEventListener("click", () => {
  containerlogin.classList.remove("right-panel-active");
});
function validateEmail(email) {
  return emailRegex.test(email);
}

function cadastrarnext() {
  if (!signUpEmail.value.includes("@")) {
    Toast.fire({
      icon: "warning",
      title: "Email invalido",
    });
  } else {
    if (signUpPassword.value.length < 8) {
      Toast.fire({
        icon: "warning",
        title: "Senha com menos de 8 caracteres",
      });
    } else {
      if (signUpPassword.value != signUpConfirmPassword.value) {
        Toast.fire({
          icon: "warning",
          title: "As senhas devem ser iguais",
        });
      } else {
        signUpForm.classList.toggle("next");
      }
    }
  }
}

function validarCadastro() {
  if (!signUpName || !signUpDate) {
    Toast.fire({
      icon: "warning",
      title: "Preencha todos os campos corretamente",
    });
    return false;
  } else if (!signUpEmail.value.includes("@")) {
    return false;
  } else if (signUpPassword.value.length < 8) {
    return false;
  } else if (signUpPassword.value != signUpConfirmPassword.value) {
    return false;
  } else if (signUpCPF.value.length != 14) {
    Toast.fire({
      icon: "warning",
      title: "Preencha o CPF corretamente",
    });
    return false;
  } else if (signUpCEP.value.length != 9) {
    Toast.fire({
      icon: "warning",
      title: "Preencha o CEP corretamente",
    });
    return false;
  } else if (signUpTelefone.value.length != 14) {
    Toast.fire({
      icon: "warning",
      title: "Preencha o telefone corretamente",
    });
    return false;
  } else {
    return true;
  }
}

$("#sign-up-cpf").mask("000.000.000-00");
$("#sign-up-cep").mask("00000-000");
$("#sign-up-tel").mask("(00)00000-0000");

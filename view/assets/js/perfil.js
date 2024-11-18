const usuario = document.getElementById("usuario");

function usuarioedit() {
    usuario.classList.toggle("usuario-edit");
  }

$("#sign-up-cpf").mask("000.000.000-00");
$("#sign-up-cep").mask("00000-000");
$("#sign-up-rg").mask("00.000.000-0"); // Máscara para RG
$("#sign-up-tel").mask("(00)00000-0000");
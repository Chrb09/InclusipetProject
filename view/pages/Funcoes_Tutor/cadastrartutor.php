<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StylePerfil.css" />
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Cadastrar Tutor</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php

    $sidebarActive = "tutor";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfilfuncionario.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>
        <!-- Conteudo principal -->
        <div class="titulo">Cadastrar Tutor</div>

        <br />
        <div class="cadastrar_pet">
          <form action="../../../model/Arquivo/Inicializacao/vetUser_process.php" class="form__cadastro" method="POST"
            onsubmit="return validarCadastro()">

            <input type="hidden" name="type" value="create_user">
            <input type="hidden" name="codTutor" value="<?= $CodTutor ?>">

            <div class="form-input">
              <label for="">Email</label><br />
              <input name="sign-up-email" id="sign-up-email" type="email" required autocomplete="off"
                placeholder="seuemail@email..." maxlength="100" />
            </div>

            <div class="form-input">
              <label for="sign-up-password">Senha</label>
              <input name="sign-up-password" id="sign-up-password" type="password" required autocomplete="off"
                placeholder="Sua senha..." maxlength="25" />
            </div>

            <div class="form-input">
              <label for="sign-up-password">Confirmar Senha</label>
              <input name="sign-up-confirm-password" id="sign-up-confirm-password" type="password" required
                autocomplete="off" placeholder="Confirme sua senha..." maxlength="25" />
            </div>
            <div class="form-input">
              <label for="sign-up-name">Nome Completo</label>
              <input name="sign-up-name" id="sign-up-name" placeholder="Seu Nome..." type="text" required
                autocomplete="off" maxlength="50" />
            </div>
            <div class="form-input">
              <label for="sign-up-date">Data de Nascimento</label>
              <input name="sign-up-date" id="sign-up-date" type="date" required autocomplete="off" min="1900-01-01"
                max="2020-01-01" />
            </div>
            <div class="form-input">
              <label for="sign-up-cpf">CPF</label>
              <input name="sign-up-cpf" id="sign-up-cpf" placeholder="000.000.000-00" type="text" required
                autocomplete="off" />
            </div>

            <div class="form-input">
              <label for="sign-up-cep">CEP</label>
              <input name="sign-up-cep" id="sign-up-cep" placeholder="00000-000" type="text" required
                autocomplete="off" />
            </div>
            <div class="form-input">
              <label for="sign-up-tel">Telefone</label>
              <input name="sign-up-tel" id="sign-up-tel" placeholder="(00)00000-0000" type="text" required
                autocomplete="off" />
            </div>

            <div class="button-wrapper-form">
              <button class="botao botao-borda" onclick="location.href='../Funcionario/funcoesdotutor.php'"
                type="button">
                Voltar
              </button>
              <button class="botao botao-solido" onclick="" type="submit">Salvar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>
<script>

  const signUpEmail = document.getElementById("sign-up-email");
  const signUpPassword = document.getElementById("sign-up-password");
  const signUpConfirmPassword = document.getElementById("sign-up-confirm-password");
  const signUpName = document.getElementById("sign-up-name");
  const signUpDate = document.getElementById("sign-up-date");
  const signUpCPF = document.getElementById("sign-up-cpf");
  const signUpCEP = document.getElementById("sign-up-cep");
  const signUpTelefone = document.getElementById("sign-up-tel");

  function validateEmail(email) {
    return emailRegex.test(email);
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

  let date = new Date();
  date.setFullYear(date.getFullYear() - 18);

  year = date.getFullYear();
  month = (date.getMonth() + 1).toString().padStart(2, "0");
  day = date.getDate().toString().padStart(2, "0");

  let dataFormatada = year + "-" + month + "-" + day;

  signUpDate.setAttribute("max", dataFormatada);
</script>

</html>
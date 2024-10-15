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
    $user = 1;
    $sidebarActive = "tutor";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfil.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>
        <!-- Conteudo principal -->
        <div class="titulo">Cadastrar Tutor</div>

        <br />
        <div class="cadastrar_pet">
          <form action="" class="form__cadastro">
            <div class="form-input">
              <label for="">Email</label><br />
              <input type="email" name="" id="" />
            </div>

            <div class="form-input">
              <label for="">Nome</label><br />
              <input type="text" name="" id="" />
            </div>

            <div class="form-input">
              <label for="">CEP</label><br />
              <input type="text" name="" id="" />
            </div>
            <div class="form-input">
              <label for="">Data de Nascimento</label><br />
              <input type="date" value="" max="" min="1900-01-01" />
            </div>
            <div class="form-input">
              <label for="">Senha Temporaria</label><br />
              <input type="text" name="" id="" />
            </div>
            <div class="form-input">
              <label for="">CPF</label><br />
              <input type="text" value="" />
            </div>

            <div class="form-input">
              <label for="">Telefone</label><br />
              <input type="text" name="" id="" />
            </div>
            <div class="form-input">
              <label for="">Codigo de Usuario</label><br />
              <input type="text" name="" id="" />
            </div>

            <div class="button-wrapper-form">
              <button class="botao botao-borda" onclick="location.href='funcoesdotutor.php'" type="button">
                Voltar
              </button>
              <button class="botao botao-solido" onclick="" type="button">Salvar</button>
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

</html>
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
  <title>Cadastrar Funcionario</title>
</head>
<style>
  .custom-select,
  select {
    width: 100%;
  }
</style>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php

    $sidebarActive = "funcionario";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfilfuncionario.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>
        <!-- Conteudo principal -->
        <div class="titulo">Cadastrar Funcionário</div>
        <br />
        <div class="cadastrar_pet"></div>

        <form action="../../../model/Arquivo/Inicializacao/auth_process.php" id="sign-up-form">
          <input type="hidden" name="type" value="register_funcionario">
          <div class="form-input desativado">
            <label for="sign-up-codVet">CodVeterinario</label><br />
            <input type="number" name="sign-up-codVet" id="sign-up-codVet" disabled />
          </div>

          <div class="form-input desativado">
            <label for="sign-up-password">Senha Temporaria</label><br />
            <input type="text" name="sign-up-password" id="sign-up-password" disabled />
          </div>

          <div class="form-input">
            <label for="sign-up-cargo">Cargo</label><br />
            <div class="custom-select">
              <select id="sign-up-cargo" name="sign-up-cargo" size="0" placeholder="Selecione...">
                <option value="clinico">Clínico geral</option>
                <option value="clinico">Clínico geral</option>
                <option value="clinico">Clínico geral</option>
              </select>
            </div>
          </div>

          <div class="form-input">
            <label for="">CPF</label><br />
            <input type="text" value="" />
          </div>

          <div class="form-input">
            <label for="">CEP</label><br />
            <input type="text" name="" id="" />
          </div>

          <div class="form-input">
            <label for="">RG</label><br />
            <input type="text" value="" />
          </div>

          <div class="form-input">
            <label for="">Telefone</label><br />
            <input type="text" name="" id="" />
          </div>

          <div class="form-input">
            <label for="">Unidade</label><br />
            <div class="custom-select">
              <select id="" name="" size="0" placeholder="Selecione...">
                <option value="alvim">Arthur Alvim</option>
                <option value="alvim">Arthur Alvim</option>
                <option value="alvim">Arthur Alvim</option>
              </select>
            </div>
          </div>

          <div class="button-wrapper-form">
            <button class="botao botao-borda" onclick="location.href='perfil.php'" type="button">Voltar</button>
            <button class="botao botao-solido" onclick="" type="button">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>

</html>
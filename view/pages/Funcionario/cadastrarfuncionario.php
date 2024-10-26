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
      <?php include('../../components/headers/headerperfil.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>
        <!-- Conteudo principal -->
        <div class="titulo">Cadastrar Funcionário</div>
        <br />
        <div class="cadastrar_pet"></div>

        <form action="" class="form__cadastro">
          <div class="form-input desativado">
            <label for="">CodVeterinario</label><br />
            <input type="number" name="" id="" disabled />
          </div>

          <div class="form-input desativado">
            <label for="">Senha Temporaria</label><br />
            <input type="text" name="" id="" disabled />
          </div>

          <div class="form-input">
            <label for="">Cargo</label><br />
            <div class="custom-select">
              <select id="" name="" size="0" placeholder="Selecione...">
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
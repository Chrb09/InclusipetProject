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
    require_once("../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php");
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfilfuncionario.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); 
         $funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);
         $cargos = $funcionarioDao->getAllCargo();
         $unidades = $funcionarioDao->getAllUnidade();
        ?>
        <!-- Conteudo principal -->
        <div class="titulo">Cadastrar Funcionário</div>
        <br />
        <div class="cadastrar_pet"></div>

        <form action="../../../model/Arquivo/Inicializacao/auth_process.php" id="sign-up-form"
          method="POST">
          <input type="hidden" name="type"  value="register_funcionario">
          <div class="form-input desativado">
            
           <!--Código do veterinário-->
            <label for="sign-up-codVet">CodVeterinario</label><br />
            <input type="number" name="sign-up-codVet" id="sign-up-codVet" disabled />
          </div>

          <!--Senha-->
          <div class="form-input desativado">
            <label for="sign-up-password">Senha Temporaria</label><br />
            <input type="text" name="sign-up-password" id="sign-up-password" disabled />
          </div>

          <!--Nome-->
          <div class="form-input">
           <label for="sign-up-nome">Nome</label><br />
           <input type="text" name="sign-up-nome" id="sign-up-nome" />
          </div>

          <!--Cargo do funcionário-->
          <div class="form-input">
            <label for="sign-up-cargo">Cargo</label><br />
            <div class="custom-select">
              <select id="" name="cargo" size="0">
                  <?php foreach ($cargos as $cargo): ?>
                    <option value="<?= $cargo[0] ?>">
                      <?= $funcionarioDao->getCargoByCod($cargo[0]) ?>
                    </option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>
          

          <!--CPF-->
          <div class="form-input">
            <label for="sign-up-cpf">CPF</label><br />
            <input type="text" value="sign-up-cpf" id="sign-up-cpf" placeholder="000.000.000-00" />
          </div>

          <!--CEP-->
          <div class="form-input">
            <label for="sign-up-cep">CEP</label><br />
            <input type="text" name="sign-up-cep" id="sign-up-cep" placeholder="00000-000" />
          </div>

          <!--RG-->
          <div class="form-input">
            <label for="sign-up-rg">RG</label><br />
            <input type="text" name="sign-up-rg" id="sign-up-rg" placeholder="00.000.000-0" />
          </div>

          <!--Telefone-->
          <div class="form-input">
            <label for="sign-up-tel">Telefone</label><br />
            <input type="text" name="sign-up-tel" id="sign-up-tel" placeholder="(**)" />
          </div>

          <!--Unidade-->
          <div class="form-input">
            <label for="">Unidade</label><br />
            <div class="custom-select">
              <select id="" name="sign-up-unidade" size="0" placeholder="Selecione...">
                   <?php foreach ($unidades as $unidade): ?>
                    <!-- Define uma opção no select com o valor da unidade -->
                    <option value="<?= $unidade[0] ?>">
                      <?= $funcionarioDao->getUnidadeByCod($unidade[0])[1] ?>
                    </option>
                  <?php endforeach; ?>
              </select>
            </div>
          </div>

          <div class="button-wrapper-form">
            <button class="botao botao-borda" onclick="location.href='perfil.php'" type="button">Voltar</button>
            <button class="botao-solido" value="registrar" type="submit">Cadastrar</button>
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
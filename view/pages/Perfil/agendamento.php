<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleMeusAgendamentos.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <style>
    .pets {
      width: 100%;
    }
  </style>
  <!-- ICON -->
  <title>Agendamento</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">

    <?php
    $sidebarActive = "agendamentos";
    include('../../components/sidebarperfil.php');
    require_once("../../../controller/DAO/PetDAO/PetDAO.php");
    require_once("../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php");
    require_once("../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php");
    ?>

    <div class="main">
      <?php include('../../components/headers/headerperfil.php');

      $agendamentoDao = new AgendamentoDAO($conn, $BASE_URL); // instancia do AgendamentoDAO
      $petDao = new PetDAO($conn, $BASE_URL);                 // instancia do PetDAO
      $funcionarioDao = new FuncionarioDAO($conn, $BASE_URL); // instancia do FuncionarioDAO
      
      $unidades = $agendamentoDao->getAllUnidade();
      $servicos = $agendamentoDao->getAllServico();
      $especialidades = $agendamentoDao->getAllEspecialidade();
      $pets = $petDao->getPetsByCodCliente($clienteData->codcliente);
      $funcionarios = $funcionarioDao->getAllFuncionario();

      // Verifica se existem animais de estimação associados ao cliente
      if ($pets !== []) {

        // Verifica se o código do animal foi passado via GET
        if (isset($_GET['codAnimal'])) {
          $CodAnimal = $_GET['codAnimal']; // Atribui o código do animal passado na URL
        } else {
          $CodAnimal = $pets[0]->CodAnimal; // Caso contrário, usa o primeiro animal na lista
        }

        // Busca as informações do animal usando o código fornecido
        $petInfo = $petDao->findByCod($CodAnimal);
      }
      ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>

        <!-- Começo do conteúdo principal -->
        <div class="titulo"><?php
        if ($pets !== []) {
          echo ("Meus Pets");
        } else {
          echo ("Nenhum pet cadastrado!");
        } ?></div>


        <!-- se os pets ja estiverem sido cadastrados -->
        <?php if ($pets !== []) { ?>

          <!-- começo do formulário  -->
          <form class="form__cadastro" action="resumoagendamento.php" method="POST">



            <div class="pets">

              <div class="meus-pets">
                <?php


                foreach ($pets as $pet):
                  $petNome = explode(' ', trim($pet->Nome));
                  ?>

                  <label class="button-pet selecionado" for="idlabel<?= $pet->CodAnimal ?>">
                    <img src="../../assets/img/ImagensPet/<?php

                    if ($pet->Imagem == "") {
                      echo ("pet.png");
                    } else {
                      echo ($pet->Imagem);
                    }

                    ?>" alt="" class="img-menor" /> <?= $petNome[0] ?>
                    <input type="radio" name="pet" value="<?= $pet->CodAnimal ?>" id="idlabel<?= $pet->CodAnimal ?>"
                      class="check-pet" required <?php
                      if ($pet->CodAnimal == $petInfo->CodAnimal)
                        print ("checked"); ?>>
                  </label>
                <?php endforeach; ?>
              </div>
              <button class="button-pet button-cadastrar" onclick="location.href='cadastraranimal.php'" type="button">
                <img src="../../assets/img/Perfil/adicionar.png" alt="" class="img-menor novo-pet" />
                <div class="cadastrar-pet">Cadastrar Novo Pet</div>
              </button>
            </div>

            <!-- unidade -->
            <div class="form-input">
              <label for="">Unidade</label><br />
              <div class="custom-select">
                <select id="" name="unidade" required>

                  <?php foreach ($unidades as $unidade): ?>
                    <!-- Define uma opção no select com o valor da unidade -->
                    <option value="<?= $unidade[0] ?>">
                      <?= $agendamentoDao->getUnidadeByCod($unidade[0])[1] ?>
                    </option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>

            <!-- especialidade -->
            <div class="form-input">
              <label for="">Especialidade</label><br />
              <div class="custom-select">
                <select id="" name="especialidade" required>

                  <?php foreach ($especialidades as $especialidade): ?>
                    <!-- Define uma opção no select com o valor da  -->
                    <option value="<?= $especialidade[0] ?>">
                      <?= $agendamentoDao->getEspecialidadeByCod($especialidade[0]) ?>
                    </option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>

            <!-- profissionais -->
            <div class="form-input">
              <label for="">Profissional</label><br />
              <div class="custom-select">
                <select id="" name="profissional" required>

                  <?php foreach ($funcionarios as $funcionario): ?>
                    <!-- Define uma opção no select com o valor da  -->
                    <option value="<?= $funcionario->codfuncionario ?>">
                      <?= $funcionario->nome ?>
                    </option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>

            <!-- serviço -->
            <div class="form-input">
              <label for="">Serviço</label><br />
              <div class="custom-select">
                <select id="" name="servico" required">

                  <?php foreach ($servicos as $servico): ?>
                    <!-- Define uma opção no select com o valor da  -->
                    <option value="<?= $servico[0] ?>">
                      <?= $agendamentoDao->getServicoByCod($servico[0]) ?>
                    </option>
                  <?php endforeach; ?>

                </select>
              </div>
            </div>

            <!-- data -->
            <div class="form-input">
              <label for="">Data desejada para consulta</label><br />
              <input type="date" name="data" id="dataConsulta" value="" max="" min="1900-01-01" required />
            </div>

            <!-- hora -->
            <div class="form-input">
              <label for="">Horário desejado para consulta</label><br />
              <input type="time" name="horario" value="" step="1800" required />
            </div>

            <!-- buttons -->
            <div class="button-wrapper-form">
              <button class="botao botao-solido" type="submit">
                Continuar
              </button>
            </div>

          </form>
        <?php } ?>
        <!-- Fim do conteúdo principal -->
      </div>
    </div>
  </div>
</body>
<script>
  const DataInput = document.getElementById("dataConsulta");

  let date = new Date();

  year = date.getFullYear();
  month = (date.getMonth() + 1).toString().padStart(2, "0");
  day = date.getDate().toString().padStart(2, "0");

  let dataFormatada = year + "-" + month + "-" + day;

  DataInput.setAttribute("min", dataFormatada);
</script>

</html>
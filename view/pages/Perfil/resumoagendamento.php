<?php

if (isset($_POST)) {
  $unidade = filter_input(INPUT_POST, "unidade");
  $servico = filter_input(INPUT_POST, "servico");
  $especialidade = filter_input(INPUT_POST, "especialidade");
  $profissional = filter_input(INPUT_POST, "profissional");
  $data = filter_input(INPUT_POST, "data");
  $horario = filter_input(INPUT_POST, "horario");
  $pets = filter_input(INPUT_POST, "pet");
} else {
  header("location:agendamento.php");
}


?>
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
  <!-- ICON -->
  <title>Resumo Agendamento</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php
    $sidebarActive = "agendamentos";
    include('../../components/sidebarperfil.php');
    ?>
    <div class="main">

      <?php
      include('../../components/headers/headerperfil.php');

      require_once("../../../controller/DAO/PetDAO/PetDAO.php");
      require_once("../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php");
      require_once("../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php");

      $agendamentoDao = new AgendamentoDAO($conn, $BASE_URL); // instancia do AgendamentoDAO
      $petDao = new PetDAO($conn, $BASE_URL);                 // instancia do PetDAO
      $funcionarioDao = new FuncionarioDAO($conn, $BASE_URL); // instancia do FuncionarioDAO
      
      $funcionario = $funcionarioDao->findById($profissional);
      $pet = $petDao->findByCod($pets);
      ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>
        <div class="titulo">Resumo agendamento</div>

        <form action="../../../model/Arquivo/Inicializacao/appointment_process.php" method="POST">
          <input type="hidden" name="type" value="create_appointment"> <!-- register do agendamento -->

          <div class="pet-info">
            <div class="pet-info-wrapper">
              <div class="pet-info-img">
                <img src="../../assets/img/ImagensPet/<?php if ($pet->Imagem == "") {
                  echo ("pet.png");
                } else {
                  echo ($pet->Imagem);
                } ?>" alt="" />

                <input type="hidden" name="pet" value="<?= $pet->CodAnimal ?>">
                <strong><?= $pet->Nome ?></strong>

                <!-- informações do agendamento 
                <div class="table-row">
                  <b>Serviço Agendado</b>
                  <table class="info-table">
                    <tr>
                      <th>Consulta:</th>
                      <td>R$ 0,01</td>
                    </tr>
                  </table>
                </div>
                -->
              </div>

              <div class="pet-info-container">
                <b>Detalhes</b>
                <div class="table-row">
                  <table class="info-table">
                    <!--
                    <tr>
                      <th>Pedido:</th>
                      <td><b>34012</b></td>
                    </tr>
              -->
                    <tr>
                      <th>Unidade:</th>
                      <input type="hidden" name="unidade" value="<?= $unidade ?>">
                      <td><?= $agendamentoDao->getUnidadeByCod($unidade)[1] ?></td>
                    </tr>
                    <tr>
                      <th>Serviço:</th>
                      <input type="hidden" name="servico" value="<?= $servico ?>">
                      <td><?= $agendamentoDao->getServicoByCod($servico) ?></td>
                    </tr>
                    <tr>
                      <th>Especialidade:</th>
                      <input type="hidden" name="especialidade" value="<?= $especialidade ?>">
                      <td><?= $agendamentoDao->getEspecialidadeByCod($especialidade) ?></td>
                    </tr>
                    <tr>
                      <th>Profissional:</th>
                      <input type="hidden" name="funcionario" value="<?= $funcionario->codfuncionario ?>">
                      <td><?= $funcionario->nome ?></td>
                    </tr>
                    <tr>
                      <th>Data consulta:</th>
                      <input type="hidden" name="data" value="<?= $data ?>">
                      <td><?= $data ?></td>
                    </tr>
                    <tr>
                      <th>Hora Consulta:</th>
                      <input type="hidden" name="horario" value="<?= $horario ?>">
                      <td><?= $horario ?></td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
            <div class="button-wrapper-form">
              <button class="botao botao-borda" onclick="location.href='agendamento.php'" type="button">Voltar</button>
              <button class="botao botao-solido" type="submit">Concluir</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

</html>
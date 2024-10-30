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
  <title>Meus Agendamentos</title>
  <style>
    .nav-perfil {
      display: flex;
      flex-direction: column;
      width: 8em;
      align-items: center;
      text-align: center;
      transition: filter 0.3s;

      &:hover {
        filter: brightness(80%);
      }
    }

    .nav-perfil img {
      width: 7em;
    }

    .card-txt {
      margin-top: 0.5em;
    }
  </style>
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
      
      $agendamentos = $agendamentoDao->getAgendamentoByCodCliente($clienteData->codcliente);

      ?>
      <div class="content">

        <?php include('../../components/navmobileperfil.php');

        if ($agendamentos !== []) { ?>
          <div class="titulo">Meus Agendamentos</div>


          <!--CODIGO DA PAGINA AQUI-->
          <div class="conteudo">

            <?php foreach ($agendamentos as $agendamento):
              $funcionario = $funcionarioDao->findById($agendamento->CodFuncionario);
              $pet = $petDao->findByCod($agendamento->CodAnimal); ?>

              <div class="card-agendamento">

                <div class="animal">
                  <div class="animal-wrapper"> <!-- TODO arrumar o css -->
                    <img class="animal_photo" src="../../assets/img/ImagensPet/<?php if ($pet->Imagem == "") {
                      echo ("pet.png");
                    } else {
                      echo ($pet->Imagem);
                    } ?>" alt="" />

                    <p><?= $pet->Nome ?></p>
                  </div>
                  <div class="status <?= ($agendamento->Cancelado == 1) ? 'cancelado' : '' ?>"><?php if ($agendamento->Cancelado == 0) {
                            echo ("Tudo Certo");
                          } else {
                            echo ("Cancelado");
                          } ?></div>
                </div>
                <table class="info-table">

                  <!--
                  <tr>
                    <th>Pedido:</th>
                    <td>34012</td>
                  </tr>
                   -->

                  <tr>
                    <th>Unidade:</th>
                    <td><?= $agendamentoDao->getUnidadeByCod($agendamento->CodUnidade)[1] ?></td>
                  </tr>
                  <tr>
                    <th>Serviço:</th>
                    <td><?= $agendamentoDao->getServicoByCod($agendamento->CodServico) ?></td>
                  </tr>
                  <tr>
                    <th>Especialidade:</th>
                    <td><?= $agendamentoDao->getEspecialidadeByCod($funcionario->codcargo) ?></td>
                  </tr>
                  <tr>
                    <th>Data da Consulta:</th>
                    <td><?= $agendamento->Data ?></td>
                  </tr>
                  <tr>
                    <th>Horario da Consulta:</th>
                    <td><?= $agendamento->Hora ?></td>
                  </tr>
                </table>
                <div class="button-wrapper-form <?= ($agendamento->Cancelado == 1) ? 'desativado' : '' ?>">
                  <button class="botao botao-borda" onclick="location.href='agendamento.php'" type="button">
                    Editar
                  </button>
                  <button class="botao botao-solido" id="resetarfoto" type="button">Cancelar</button>
                </div>

              </div>
            <?php endforeach; ?>
          </div>

        <?php } else { ?>
          <div class="titulo">Nenhum agendamento realizado</div>
          <br>
          <a class="nav-perfil" href="agendamento.php"><img src="../../assets/img/Perfil/agendar.png" alt="" />
            <div class="card-txt">
              <p>Agendar</p>
              <strong>Consulta</strong>
            </div>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>
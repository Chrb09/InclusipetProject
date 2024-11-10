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

    @media (max-width: 768px) {
      .nav-perfil {
        margin-inline: auto;
      }
    }

    .botao-solido {
      max-width: 10rem !important;
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
              $pet = $petDao->findByCod($agendamento->CodAnimal);
              $dataAgendamento = new DateTime($agendamento->Data);
              $dataAtual = new DateTime("Today");
              ?>

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
                  <div class="status 
                  <?php
                  if ($agendamento->Cancelado == 1) {

                    echo 'cancelado';
                  } else {
                    if ($dataAgendamento > $dataAtual) {
                      echo "tudocerto";
                    }
                  }
                  ?>">
                    <?php if ($agendamento->Cancelado == 0) {
                      if ($dataAgendamento < $dataAtual) {
                        echo ("Concluido");
                      } else {
                        echo ("Tudo Certo");
                      }
                    } else {
                      echo ("Cancelado");
                    } ?>
                  </div>
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
                    <td><?php
                    $data = explode("-", $agendamento->Data);
                    $dataFormatada = "$data[2]/$data[1]/$data[0]";

                    echo $dataFormatada;
                    ?></td>
                  </tr>
                  <tr>
                    <th>Horario da Consulta:</th>
                    <td><?= explode(":00", string: $agendamento->Hora)[0] . "h" ?></td>
                  </tr>
                </table>
                <?php
                if ($dataAgendamento > $dataAtual) {
                  ?>
                  <div class="button-wrapper-form <?= ($agendamento->Cancelado == 1) ? 'desativado' : '' ?>">
                    <button class="botao botao-solido" id="resetarfoto" type="button"
                      onclick="cancelar(<?= $agendamento->CodAgendamento ?>, '<?= $dataFormatada ?>')">Cancelar</button>
                  </div>
                <?php } ?>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>
<script>

  function cancelar(Id, Data) {
    Swal.fire({
      title: `<div class="titulo-sweetalert">Cancelamento</div>`,
      html: `
        <form class="form-sweetalert" action="../../../model/Arquivo/Inicializacao/appointment_process.php" method="POST">
        <input type="hidden" name="type" value="cancelar">
        <input name="id" type="hidden" value="`+ Id + `" required/>
        <p>Cancelar o agendamento de: `+ Data + `?</p>
        <div class="linha-sweetalert">
          <button class="botao-borda" onclick="Swal.close()"  type="button">Voltar</button>
          <button class="botao-solido" onclick=""type="submit">Cancelar</button>
        </div>
        </form>


        `,
      customClass: {
        popup: 'container-input',
      },
      showConfirmButton: false,
      focusConfirm: false,
      backdrop: "rgb(87, 77, 189, 0.5",
    });
  }

</script>

</html>
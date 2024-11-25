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
  <style>
    .titulo {
      margin-bottom: 1em;
    }

    .info_usuario {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .linha-button {
      display: flex;
      flex-direction: column;
      align-items: start;
      gap: 0.75em;
    }

    .linha-button button {
      max-width: 12em;
      width: 100%;
    }

    bold {
      color: var(--purple);
      font-weight: 700;
    }

    .tutor {
      grid-area: tutor;
    }

    .agendamento {
      grid-area: agendamento;
    }

    .pet {
      grid-area: pet;
    }

    .grid-detalhes {
      max-width: 80%;
      display: grid;
      gap: 2em;
      grid-template-areas:
        "tutor tutor pet"
        "tutor tutor pet"
        "agendamento agendamento pet"
        "agendamento agendamento pet";
    }

    .swal2-popup {
      border-radius: 1rem;
      padding-inline: 3em;
      padding-block: 2em;
      font-size: inherit;
    }

    .container-formulario .titulo {
      margin-bottom: 0;
    }

    .container-formulario .swal2-title {
      text-align: left;
      padding: 0;
      margin-bottom: 1em;
    }

    .container-formulario .swal2-html-container {
      text-align: left;
      display: flex !important;
      flex-direction: column;
      gap: 0.5em;
      padding: 0;
    }

    .container-formulario .linha {
      width: 100%;
      align-items: center;
      justify-content: center;
    }

    .container-formulario .linha button {
      width: 80%;
    }

    .form-input {
      font-weight: 500;
      width: 100%;
    }

    @media (max-width: 1536px) {}

    @media (max-width: 1280px) {}

    /* lg */
    @media (max-width: 1024px) {
      .grid-detalhes {
        max-width: 90%;
      }
    }

    /* md */
    @media (max-width: 768px) {
      .grid-detalhes {
        max-width: 100%;
      }
    }

    /* sm */
    @media (max-width: 640px) {}

    /* xs */
    @media (max-width: 475px) {
      .grid-detalhes {
        gap: 1em;
        grid-template-areas:
          "tutor"
          "agendamento"
          "pet";
      }

      .linha-button {
        align-items: center;
      }

      .swal2-popup {
        padding-inline: 1.5em;
        padding-block: 1em;
      }
    }
  </style>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">

    <?php
    $sidebarActive = "agendamentos";
    include('../../components/sidebarvet.php'); ?>

    <div class="main">
      <?php
      include('../../components/headers/headerperfilfuncionario.php');

      require_once("../../../controller/DAO/PetDAO/PetDAO.php");
      require_once("../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php");
      require_once("../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php");
      require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

      $agendamentoDao = new AgendamentoDAO($conn, $BASE_URL); // instancia do AgendamentoDAO
      $petDao = new PetDAO($conn, $BASE_URL);                 // instancia do PetDAO
      $funcionarioDao = new FuncionarioDAO($conn, $BASE_URL); // instancia do FuncionarioDAO
      $clienteDao = new ClienteDAO($conn, $BASE_URL);         // instancia do ClienteDAO
      
      if (isset($_GET['CodAgendamento'])) {
        $CodAgendamento = $_GET['CodAgendamento'];

        $agendamento = $agendamentoDao->getAgendamentoByCodAgendamento($CodAgendamento);   // Objeto da Agendamento
        $cliente = $clienteDao->findById($agendamento->CodCliente);
        $funcionario = $funcionarioDao->findById($agendamento->CodFuncionario);
        $pet = $petDao->findByCod($agendamento->CodAnimal);
        $dataAgendamento = new DateTime($agendamento->Data);
        $dataAtual = new DateTime("Today");

      } else {
        header("Location: agendamentos.php");
      }
      ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>

        <!-- Conteudo principal -->
        <div class="titulo">Detalhes Agendamento</div>
        <div class="grid-detalhes">

          <!-- cliente -->
          <div class="info_usuario tutor">
            <table class="info-table">
              <tr>
                <b>Detalhes do Tutor</b>
              </tr>
              <tr>
                <th>Nome:</th>
                <td><?= $cliente->nome ?></td>
              </tr>
              <tr>
                <th>Data Nasc:</th>
                <td>
                  <?php
                  $dataNasc = explode("-", $cliente->datanasc);
                  $dataNascFormatada = "$dataNasc[2]/$dataNasc[1]/$dataNasc[0]";
                  echo $dataNascFormatada;
                  ?>
                </td>
              </tr>
              <tr>
                <th>Email:</th>
                <td><?= $cliente->email ?></td>
              </tr>
              <tr>
                <th>Telefone:</th>
                <td><?= $cliente->telefone ?></td>
              </tr>
              <tr>
                <th>CEP/CPF:</th>
                <td><?= $cliente->cep ?> / <?= $cliente->cpf ?></td>
              </tr>
            </table>
          </div>

          <!-- agendamento -->
          <div class="info_usuario agendamento">
            <table class="info-table">

              <tr>
                <b>Detalhes do Agendamento</b>
              </tr>

              <tr>
                <th>Pedido:</th>
                <td>
                  <bold><?= $agendamento->CodAgendamento ?></bold>
                </td>
              </tr>

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
                <th>Profissional:</th>
                <td><?= $funcionario->nome ?></td>
              </tr>

              <tr>
                <th>Data:</th>
                <td><?php
                $data = explode("-", $agendamento->Data);
                $dataFormatada = "$data[2]/$data[1]/$data[0]";

                echo $dataFormatada;
                ?></td>
              </tr>

              <tr>
                <th>Horario:</th>
                <td><?= explode(":00", string: $agendamento->Hora)[0] . "h" ?></td>
              </tr>

            </table>
          </div>

          <!-- pet -->
          <div class="info_usuario pet">
            <div>
              <table class="info-table">
                <tr>
                  <b>Detalhes do Pet</b>
                </tr>
                <tr>
                  <th>Nome:</th>
                  <td><?= $pet->Nome ?></td>
                </tr>
                <tr>
                  <th>Espécie:</th>
                  <td><?= $petDao->getPetEspecie($pet) ?></td>
                </tr>
                <tr>
                  <th>Raça:</th>
                  <td><?= $petDao->getPetRaca($pet) ?></td>
                </tr>
                <tr>
                  <th>Sexo:</th>
                  <td><?= $pet->Sexo ?></td>
                </tr>
                <tr>
                  <th>Data Nasc:</th>
                  <td><?php if ($pet->DataNasc == "") {
                    echo ("-");
                  } else {
                    $petDataNasc = explode("-", $cliente->datanasc);
                    $petDataNascFormatada = "$petDataNasc[2]/$petDataNasc[1]/$petDataNasc[0]";
                    echo $petDataNascFormatada;

                  } ?></td>
                </tr>
              </table>
              <table class="info-table">
                <tr>
                  <th>Data Aprox:</th>
                  <td><?php if ($pet->DataAprox == "") {
                    echo ("-");
                  } else {
                    echo ($pet->DataAprox);
                  } ?></td>
                </tr>
                <!-- 
                <tr>
                  <th>Porte:</th>
                  <td>Grande</td>
                </tr>
                -->
                <tr>
                  <th>Castrado?</th>
                  <td>
                    <?php if ($pet->Castrado == 0) {
                      echo ("Não");
                    } else {
                      echo ("Sim");
                    } ?>
                  </td>
                </tr>
                <tr>
                  <th>Peso:</th>
                  <td><?= $pet->Peso ?>KG</td>
                </tr>
              </table>
            </div>
            <div class="linha-button">
              <?php if ($dataAgendamento <= $dataAtual) {
                if ($agendamento->Info != '') {
                  ?>
                  <button class="botao-solido" onclick="enviarRelatorio(<?= $agendamento->CodAgendamento ?>)"
                    type="button">Enviar Novamente</button>
                <?php } else { ?>
                  <button class="botao-solido" onclick="enviarRelatorio(<?= $agendamento->CodAgendamento ?>)"
                    type="button">Enviar
                    Relatório</button>
                <?php }
              } ?>
              <button class="botao-borda" onclick="location.href='agendamentos.php'" type="button">Voltar</button>
            </div>
          </div>

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
  function enviarRelatorio(codAgendamento) {
    Swal.fire({
      title: `<div class="titulo">Enviar Relatorio para Cod ` + codAgendamento + `</div>`,
      html: `
      <form class="form-sweetalert" action="../../../model/Arquivo/Inicializacao/appointment_process.php" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="type" value="enviarrelatorio">
        <input name="id" type="hidden" value="`+ codAgendamento + `" required/>
        <div class="form-input">
          <label for="">Informações Adicionais</label>
          <textarea name="info" id="" maxlength="200" cols="30" rows="3" placeholder="Escreva sua mensagem..." required></textarea>
        </div>
        <div class="form-input">
          <label for="">PDF Resultado dos Exames</label>
          <input type="file" name="pdf" value="pdf" accept=".pdf"  required/>
        </div>
        <div class="linha">
          <button class="botao-borda" onclick="Swal.close()" type="button">Voltar</button>
          <button class="botao-solido" onclick="" type="submit">Enviar</button>
        </div>
</form>
        `,
      customClass: {
        popup: 'container-formulario',
      },
      showConfirmButton: false,
      focusConfirm: false,
      backdrop: "rgb(87, 77, 189, 0.5",
    });
  }
</script>

</html>
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
    .conteudo {
      display: grid;
      padding-block: 2rem;
      width: 100%;
      padding-right: 0em;
      padding-inline: 0;
      grid-template-columns: repeat(auto-fit, 22em);
      gap: 1em;
    }

    .animal-wrapper img {
      width: 3em;
    }

    .card-agendamento {
      max-width: 22em;
    }

    .card-agendamento .botao-solido {
      --purple: #574dbd;
      --purplehover: #403898;
    }

    .card-agendamento .button-wrapper-form {
      width: 100%;
    }

    .card-agendamento .button-wrapper-form button {
      width: fit-content;
    }

    .status {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.5em;
    }

    .status img {
      height: 1.2em;
    }

    .linha-hr {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 1em;
      width: 100%;
    }

    .linha-hr b {
      font-size: 1.75em;
    }

    .linha-hr .hr {
      width: 100%;
      margin-block: 0;
      border-top: 2px solid var(--purple);
      border-bottom: 2px solid var(--purple);
    }

    .conteudo {
      padding-block: 0;
    }

    .conteudo-principal {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      width: 100%;
      gap: 1.5rem;
    }

    .top {
      display: flex;
      flex-wrap: wrap;
      gap: 1em;
      margin-block: 1.75em;
      width: 100%;
    }

    .top .custom-select {
      width: 100%;
    }

    .form-group {
      display: flex;
      flex-direction: column;
      align-items: flex-start;
      min-width: 20%;
    }

    .form-group input:not([type="radio"]) {
      width: 100%;
    }

    .radio-group {
      flex-wrap: wrap;
    }

    @media (max-width: 1024px) {
      .form-group {
        min-width: 30%;
      }
    }

    @media (max-width: 768px) {
      .top {
        display: flex;
        flex-direction: column;
        width: 70%;
      }

      .conteudo {
        justify-content: center;
      }
    }

    @media (max-width: 475px) {
      .top {
        width: 100%;
      }
    }
  </style>
  <!-- ICON -->
  <title>Agendamentos</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php

    $sidebarActive = "agendamentos";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfilfuncionario.php');

      require_once("../../../controller/DAO/PetDAO/PetDAO.php");
      require_once("../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php");
      require_once("../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php");
      require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

      $agendamentoDao = new AgendamentoDAO($conn, $BASE_URL); // instancia do AgendamentoDAO
      $petDao = new PetDAO($conn, $BASE_URL);                 // instancia do PetDAO
      $funcionarioDao = new FuncionarioDAO($conn, $BASE_URL); // instancia do FuncionarioDAO
      $clienteDao = new ClienteDAO($conn, $BASE_URL);         // instancia do ClienteDAO
      
      $agendamentos = $agendamentoDao->getAllAgendamento();
      ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>

        <!-- Conteudo principal -->
        <div class="conteudo-principal">
          <div class="titulo">Agendamentos</div>
          <div class="top">

            <!-- FILTROS -->
            <div class="form-group">
              <label for="data">A Partir de:</label>
              <input type="date" id="data" name="data" />
            </div>

            <div class="form-group">
              <label for="pet">Mostrar até:</label>
              <div class="custom-select">
                <select id="pet" name="pet">
                  <option value="1semana">1 Semana</option>
                  <option value="1mes">1 Mês</option>
                  <option value="6meses">6 Meses</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label for="tipo">Filtros:</label>
              <div class="radio-group">
                <div class="radio-div">
                  <input type="radio" name="filtro" value="Proximos" class="radio" />
                  <label for="">Próximos</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="filtro" value="Sem" class="radio" />
                  <label for="">Sem Relatório</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="filtro" value="Com" class="radio" />
                  <label for="">Com Relatório</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="filtro" value="Todos" class="radio" checked />
                  <label for="">Todos</label>
                </div>
              </div>
            </div>
          </div>
          <div class="linha-hr">
            <b>DD/MM</b>
            <div class="hr"></div>
          </div>

          <!-- AGENDAMENTOS -->
          <div class="conteudo">

            <?php foreach ($agendamentos as $agendamento):
              $cliente = $clienteDao->findById($agendamento->CodCliente);
              $funcionario = $funcionarioDao->findById($agendamento->CodFuncionario);
              $pet = $petDao->findByCod($agendamento->CodAnimal);
              $dataAgendamento = new DateTime($agendamento->Data);
              $dataAtual = new DateTime("Today");
              ?>

              <div class="card-agendamento">
                <div class="animal">
                  <div class="animal-wrapper">
                    <img src="../../assets/img/Perfil/fonseca.png" alt="" />
                    <p><?= $pet->Nome ?></p>
                  </div>
                  <div class="status 
                  <?php
                  if ($dataAgendamento < $dataAtual) {
                    if ($agendamento->Info == '') {
                      echo 'pendente';
                    }
                  }
                  ?>">
                    <?php
                    if ($dataAgendamento < $dataAtual) {
                      if ($agendamento->Info == '') {
                        echo 'Enviar Relatorio';
                      } else {
                        echo 'Enviado';
                      }
                    } else {
                      echo '<img src="../../assets/img/Perfil/horario.png" alt=""/> ' . explode(":00", string: $agendamento->Hora)[0] . "h";
                    } ?>
                  </div> <!-- TODO -->
                </div>
                <table class="info-table">
                  <tr>
                    <th>Tutor:</th>
                    <td><?= $cliente->nome ?></td>
                  </tr>

                  <tr>
                    <th>Serviço:</th>
                    <td><?= $agendamentoDao->getServicoByCod($agendamento->CodServico) ?></td>
                  </tr>

                  <tr>
                    <th>Pedido:</th>
                    <td><?= $agendamento->CodAgendamento ?></td>
                  </tr>

                  <tr>
                    <th>Data Consulta:</th>
                    <td><?php
                    $data = explode("-", $agendamento->Data);
                    $dataFormatada = "$data[2]/$data[1]/$data[0]";

                    echo $dataFormatada;
                    ?></td>
                  </tr>
                </table>
                <div class="button-wrapper-form">
                  <button class="botao botao-solido"
                    onclick="location.href='resumoagendamento.php?CodAgendamento=<?= $agendamento->CodAgendamento ?>'"
                    type="button">
                    Visualizar Detalhes
                  </button>
                </div>
              </div>

            <?php endforeach; ?>

            <!-- 
            <div class="card-agendamento">
              <div class="animal">
                <div class="animal-wrapper">
                  <img src="../../assets/img/Perfil/fonseca.png" alt="" />
                  <p>Fonseca</p>
                </div>
                <div class="status pendente">Pendente</div>
              </div>
              <table class="info-table">
                <tr>
                  <th>Tutor:</th>
                  <td>Miguel Yudi Baba</td>
                </tr>
                <tr>
                  <th>Serviço:</th>
                  <td>Exame</td>
                </tr>
                <tr>
                  <th>Pedido:</th>
                  <td>34012</td>
                </tr>
                <tr>
                  <th>Data Consulta:</th>
                  <td>12/09/2024</td>
                </tr>
              </table>
              <div class="button-wrapper-form">
                <button class="botao botao-solido" onclick="location.href='resumoagendamento.php'" type="button">
                  Visualizar Detalhes
                </button>
              </div>
            </div>

            <div class="card-agendamento">
              <div class="animal">
                <div class="animal-wrapper">
                  <img src="../../assets/img/Perfil/fonseca.png" alt="" />
                  <p>Fonseca</p>
                </div>
                <div class="status"><img src="../../assets/img/Perfil/horario.png" alt="" />13:00</div>
              </div>
              <table class="info-table">
                <tr>
                  <th>Tutor:</th>
                  <td>Miguel Yudi Baba</td>
                </tr>
                <tr>
                  <th>Serviço:</th>
                  <td>Exame</td>
                </tr>
                <tr>
                  <th>Pedido:</th>
                  <td>34012</td>
                </tr>
                <tr>
                  <th>Data Consulta:</th>
                  <td>12/09/2024</td>
                </tr>
              </table>
              <div class="button-wrapper-form">
                <button class="botao botao-solido" onclick="location.href='resumoagendamento.php'" type="button">
                  Visualizar Detalhes
                </button>
              </div>
            </div>
          </div>
          <div class="linha-hr">
            <b>13/09</b>
            <div class="hr"></div>
          </div>
          <div class="conteudo">
            <div class="card-agendamento">
              <div class="animal">
                <div class="animal-wrapper">
                  <img src="../../assets/img/Perfil/fonseca.png" alt="" />
                  <p>Fonseca</p>
                </div>
                <div class="status"><img src="../../assets/img/Perfil/horario.png" alt="" />15:00</div>
              </div>
              <table class="info-table">
                <tr>
                  <th>Tutor:</th>
                  <td>Miguel Yudi Baba</td>
                </tr>
                <tr>
                  <th>Serviço:</th>
                  <td>Exame</td>
                </tr>
                <tr>
                  <th>Pedido:</th>
                  <td>34012</td>
                </tr>
                <tr>
                  <th>Data Consulta:</th>
                  <td>13/09/2024</td>
                </tr>
              </table>
              <div class="button-wrapper-form">
                <button class="botao botao-solido" onclick="location.href='resumoagendamento.php'" type="button">
                  Visualizar Detalhes
                </button>
              </div>
            </div>
          </div>
          <div class="linha-hr">
            <b>14/09</b>
            <div class="hr"></div>
          </div>
          <div class="conteudo">
            <div class="card-agendamento">
              <div class="animal">
                <div class="animal-wrapper">
                  <img src="../../assets/img/Perfil/fonseca.png" alt="" />
                  <p>Fonseca</p>
                </div>
                <div class="status"><img src="../../assets/img/Perfil/horario.png" alt="" />16:00</div>
              </div>
              <table class="info-table">
                <tr>
                  <th>Tutor:</th>
                  <td>Miguel Yudi Baba</td>
                </tr>
                <tr>
                  <th>Serviço:</th>
                  <td>Exame</td>
                </tr>
                <tr>
                  <th>Pedido:</th>
                  <td>34012</td>
                </tr>
                <tr>
                  <th>Data Consulta:</th>
                  <td>14/09/2024</td>
                </tr>
              </table>
              <div class="button-wrapper-form">
                <button class="botao botao-solido" onclick="location.href='resumoagendamento.php'" type="button">
                  Visualizar Detalhes
                </button>
              </div>
            </div>
            <div class="card-agendamento">
              <div class="animal">
                <div class="animal-wrapper">
                  <img src="../../assets/img/Perfil/fonseca.png" alt="" />
                  <p>Fonseca</p>
                </div>
                <div class="status"><img src="../../assets/img/Perfil/horario.png" alt="" />17:30</div>
              </div>
              <table class="info-table">
                <tr>
                  <th>Tutor:</th>
                  <td>Miguel Yudi Baba</td>
                </tr>
                <tr>
                  <th>Serviço:</th>
                  <td>Exame</td>
                </tr>
                <tr>
                  <th>Pedido:</th>
                  <td>34012</td>
                </tr>
                <tr>
                  <th>Data Consulta:</th>
                  <td>14/09/2024</td>
                </tr>
              </table>
              <div class="button-wrapper-form">
                <button class="botao botao-solido" onclick="location.href='resumoagendamento.php'" type="button">
                  Visualizar Detalhes
                </button>
              </div>
            </div>
          </div>
        </div>
            -->
          </div>
        </div>
      </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>

</html>
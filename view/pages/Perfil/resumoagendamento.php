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
      <?php include('../../components/headers/headerperfil.php'); ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>
        <div class="titulo">Resumo agendamento</div>
        <div class="pet-info">
          <div class="pet-info-wrapper">
            <div class="pet-info-img">
              <img src="../../assets/img/Adocao/Animal1/img1.png" alt="" />
              <strong>Fonseca</strong>

              <div class="table-row">
                <b>Serviço Agendado</b>
                <table class="info-table">
                  <tr>
                    <th>Consulta:</th>
                    <td>R$ 0,01</td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="pet-info-container">
              <b>Detalhes</b>
              <div class="table-row">
                <table class="info-table">
                  <tr>
                    <th>Pedido:</th>
                    <td><b>34012</b></td>
                  </tr>
                  <tr>
                    <th>Unidade:</th>
                    <td>Artur Alvim</td>
                  </tr>
                  <tr>
                    <th>Serviço:</th>
                    <td>Exame</td>
                  </tr>
                  <tr>
                    <th>Especialidade:</th>
                    <td>Clínico Geral</td>
                  </tr>
                  <tr>
                    <th>Profissional:</th>
                    <td>Mônica Machado</td>
                  </tr>
                  <tr>
                    <th>Data consulta:</th>
                    <td>24/04/2024</td>
                  </tr>
                  <tr>
                    <th>Hora Consulta:</th>
                    <td>11:20</td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="button-wrapper-form">
            <button class="botao botao-borda" onclick="location.href='agendamento.php'" type="button">Voltar</button>
            <button class="botao botao-solido" onclick="location.href='meusagendamentos.php'" type="button">
              Concluir
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
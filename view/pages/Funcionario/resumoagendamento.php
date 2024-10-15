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

    .swal2-popup .titulo {
      margin-bottom: 0;
    }

    .swal2-container .swal2-title {
      text-align: left;
      padding: 0;
      margin-bottom: 1em;
    }

    .swal2-container .swal2-html-container {
      text-align: left;
      display: flex !important;
      flex-direction: column;
      gap: 0.5em;
      padding: 0;
    }

    .swal2-container .linha {
      width: 100%;
      align-items: center;
      justify-content: center;
    }

    .swal2-container .linha button {
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
    $user = 1;
    $sidebarActive = "agendamentos";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfil.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>

        <!-- Conteudo principal -->
        <div class="titulo">Detalhes Agendamento</div>
        <div class="grid-detalhes">
          <div class="info_usuario tutor">
            <table class="info-table">
              <tr>
                <b>Detalhes do Tutor</b>
              </tr>
              <tr>
                <th>Nome:</th>
                <td>Miguel Yudi Baba</td>
              </tr>
              <tr>
                <th>Data Nasc:</th>
                <td>11/04/2008</td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>hatsunemikolover@gmail.com</td>
              </tr>
              <tr>
                <th>Telefone:</th>
                <td>+11 91234-5678</td>
              </tr>
              <tr>
                <th>CEP/CPF:</th>
                <td>69093-809 / 252.910.260-06</td>
              </tr>
            </table>
          </div>
          <div class="info_usuario agendamento">
            <table class="info-table">
              <tr>
                <b>Detalhes do Agendamento</b>
              </tr>
              <tr>
                <th>Pedido:</th>
                <td>
                  <bold>34012</bold>
                </td>
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
                <td>YuYuHakusho Roxo</td>
              </tr>
              <tr>
                <th>Data:</th>
                <td>24/04/2024</td>
              </tr>
              <tr>
                <th>Horario:</th>
                <td>11:20</td>
              </tr>
            </table>
          </div>
          <div class="info_usuario pet">
            <div>
              <table class="info-table">
                <tr>
                  <b>Detalhes do Pet</b>
                </tr>
                <tr>
                  <th>Nome:</th>
                  <td>Fonseca</td>
                </tr>
                <tr>
                  <th>Espécie:</th>
                  <td>Canino</td>
                </tr>
                <tr>
                  <th>Raça:</th>
                  <td>Vira-Lata</td>
                </tr>
                <tr>
                  <th>Sexo:</th>
                  <td>Macho</td>
                </tr>
                <tr>
                  <th>Data Nasc:</th>
                  <td>-</td>
                </tr>
                <tr>
                  <th>Data Aprox:</th>
                  <td>2008</td>
                </tr>
                <tr>
                  <th>Porte:</th>
                  <td>Grande</td>
                </tr>
                <tr>
                  <th>Castrado?</th>
                  <td>Sim</td>
                </tr>
                <tr>
                  <th>Peso:</th>
                  <td>8KG</td>
                </tr>
              </table>
            </div>
            <div class="linha-button">
              <button class="botao-solido" onclick="enviarRelatorio()" type="button">Enviar Relatorio</button>
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
  function enviarRelatorio() {
    Swal.fire({
      title: `<div class="titulo">Enviar Relatorio</div>`,
      html: `
        <div class="form-input">
          <label for="">Informações Adicionais</label>
          <textarea name="" id="" cols="30" rows="3" placeholder="Escreva sua mensagem..."></textarea>
        </div>
        <div class="form-input">
          <label for="">PDF Resultado dos Exames</label>
          <input type="file" value="" />
        </div>
        <div class="linha">
          <button class="botao-borda" onclick="Swal.close()" type="button">Voltar</button>
          <button class="botao-solido" onclick="Swal.close()" type="button">Enviar</button>
        </div>

        `,
      showConfirmButton: false,
      focusConfirm: false,
      backdrop: "rgb(87, 77, 189, 0.5",
    });
  }
</script>

</html>
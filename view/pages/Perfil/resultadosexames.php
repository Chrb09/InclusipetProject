<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleResultadosDeExames.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Resultados Exames</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php
    $sidebarActive = "exames";
    include('../../components/sidebarperfil.php');
    ?>
    <div class="main">
      <?php include('../../components/headerperfil.php'); ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>
        <div class="titulo">Resultado de Exames</div>
        <!--CODIGO DA PAGINA AQUI-->
        <div class="top">
          <img src="../../assets/img/Perfil/fonseca.png" alt="Foto do Pet" class="pet-img" />
          <div class="form-group">
            <label for="pet">Pet:</label>
            <div class="custom-select">
              <select id="pet" name="pet">
                <option value="fonseca">Fonseca</option>
                <option value="max">Max</option>
                <option value="nenem">Neném</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label for="data">A Partir de:</label>
            <input type="date" id="data" name="data" />
          </div>

          <div class="form-group">
            <label for="tipo">Tipo de Exame:</label>
            <div class="custom-select">
              <select id="tipo" name="tipo">
                <option value="check-up">Check-Up</option>
                <option value="check-up">Raio-x</option>
                <option value="check-up">Radiografia</option>
              </select>
            </div>
          </div>
        </div>

        <div class="card-container">
          <div class="card">
            <div class="details">
              <div class="summary summary-exame">
                <div class="table-wrapper">
                  <table class="info">
                    <tr>
                      <th>Pedido</th>
                      <th>Data/Horario</th>
                      <th>Exames</th>
                      <th>Profissional</th>
                      <th>Unidade</th>
                    </tr>
                    <tr>
                      <td>34012</td>
                      <td>
                        24/04/2024 <br />
                        11:20
                      </td>
                      <td>Check-Up</td>
                      <td>Mônica Machado</td>
                      <td>Artur Alvim</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="wrapper-faq">
                <div class="colapse">
                  <p>
                    <strong>Info Adicionais:</strong>
                    Check-Up completo realizado, incluindo análises de sangue, urina e fezes e uma avaliação física
                    geral.
                  </p>
                  <div class="botao-borda">Baixar PDF</div>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)"
                class="arrow_faq">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </div>
          </div>

          <div class="card">
            <div class="details">
              <div class="summary summary-exame">
                <div class="table-wrapper">
                  <table class="info">
                    <tr>
                      <th>Pedido</th>
                      <th>Data/Horario</th>
                      <th>Exames</th>
                      <th>Profissional</th>
                      <th>Unidade</th>
                    </tr>
                    <tr>
                      <td>34012</td>
                      <td>
                        24/04/2024 <br />
                        11:20
                      </td>
                      <td>Check-Up</td>
                      <td>Mônica Machado</td>
                      <td>Artur Alvim</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="wrapper-faq">
                <div class="colapse">
                  <p>
                    <strong>Info Adicionais:</strong>
                    Check-Up completo realizado, incluindo análises de sangue, urina e fezes e uma avaliação física
                    geral.
                  </p>
                  <div class="botao-borda">Baixar PDF</div>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)"
                class="arrow_faq">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </div>
          </div>

          <div class="card">
            <div class="details">
              <div class="summary summary-exame">
                <div class="table-wrapper">
                  <table class="info">
                    <tr>
                      <th>Pedido</th>
                      <th>Data/Horario</th>
                      <th>Exames</th>
                      <th>Profissional</th>
                      <th>Unidade</th>
                    </tr>
                    <tr>
                      <td>34012</td>
                      <td>
                        24/04/2024 <br />
                        11:20
                      </td>
                      <td>Check-Up</td>
                      <td>Mônica Machado</td>
                      <td>Artur Alvim</td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="wrapper-faq">
                <div class="colapse">
                  <p>
                    <strong>Info Adicionais:</strong>
                    Check-Up completo realizado, incluindo análises de sangue, urina e fezes e uma avaliação física
                    geral.
                  </p>
                  <div class="botao-borda">Baixar PDF</div>
                </div>
              </div>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="var(--purple)"
                class="arrow_faq">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="../../assets/js/exames.js"></script>

</html>
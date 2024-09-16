<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleMeusPets.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Meus Pets</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php
    $user = 0;
    $sidebarActive = "pets";
    include('../../components/sidebarperfil.php');
    ?>
    <div class="main">
      <?php include('../../components/headerperfil.php'); ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>
        <div class="titulo">Meus Pets</div>
        <div class="pets">
          <div class="meus-pets">
            <button class="button-pet selecionado" type="button">
              <img src="../../assets/img/Adocao/Animal1/img1.png" alt="" class="img-menor" /> Fonseca
            </button>

            <button class="button-pet" type="button">
              <img src="../../assets/img/Adocao/Animal3/img1.png" alt="" class="img-menor" />Neném
            </button>

            <button class="button-pet" type="button">
              <img src="../../assets/img/Adocao/Animal4/img1.png" alt="" class="img-menor" />Max
            </button>
          </div>
          <button class="button-pet button-cadastrar" onclick="location.href='cadastraranimal.php'" type="button">
            <img src="../../assets/img/Perfil/adicionar.png" alt="" class="img-menor novo-pet" />
            <div class="cadastrar-pet">Cadastrar Novo Pet</div>
          </button>
        </div>
        <div class="pet-info">
          <div class="pet-info-img">
            <img src="../../assets/img/Adocao/Animal1/img1.png" alt="" />
            <strong>Fonseca</strong>
          </div>
          <div class="pet-info-container">
            <b>Detalhes</b>
            <div class="table-row">
              <table class="info-table">
                <tr>
                  <th>Espécie:</th>
                  <td>Canino</td>
                </tr>
                <tr>
                  <th>raça:</th>
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
              </table>
              <table class="info-table">
                <tr>
                  <th>Data Aprox:</th>
                  <td>2008</td>
                </tr>
                <tr>
                  <th>Porte:</th>
                  <td>Grande</td>
                </tr>
                <tr>
                  <th>Castrado?/</th>
                  <td>Sim</td>
                </tr>
                <tr>
                  <th>Peso:</th>
                  <td>8 KG</td>
                </tr>
              </table>
            </div>
            <div class="button-row">
              <button class="botao-solido" onclick="location.href='agendamento.php'" type="button">
                Agendar Consulta
              </button>
              <button class="botao-solido editar-button" onclick="location.href='cadastraranimal.php'" type="button">
                <img src="../../assets/img/Perfil/editar_icon.png" alt="" />Editar
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
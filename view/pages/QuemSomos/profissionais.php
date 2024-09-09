<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleQuemSomos.css" />
  <link rel="stylesheet" href="../../assets/css/StyleProfissionais.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Nossos Profissionais</title>
</head>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "quemsomos";
  include_once('../../components/header.php');
  ?>
  <!--Conteudo-->

  <div class="main">
    <?php
    $sidebarActive = "profissionais";
    include_once('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include_once('../../components/navmobilequemsomos.php');
      ?>
      <div class="titulo">Nossos Profissionais</div>
      <!--CODIGO DA PAGINA AQUI-->
      <div class="card-container">
        <div class="card">
          <img src="../../assets/img/QuemSomos/prof1.png" alt="" />
          <div class="table-wrapper">
            <table class="info">
              <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Unidade</th>
                <th>Anos de atuação</th>
                <th>Nota</th>
              </tr>
              <tr>
                <td>Klein Figueiredo</td>
                <td>Nêurologia</td>
                <td>Artur Alvim</td>
                <td>10 Anos</td>
                <td>4,5 Estrelas</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="card">
          <img src="../../assets/img/QuemSomos/prof2.png" alt="" />
          <div class="table-wrapper">
            <table class="info">
              <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Unidade</th>
                <th>Anos de atuação</th>
                <th>Nota</th>
              </tr>
              <tr>
                <td>Sarah Siqueira</td>
                <td>Fisioterapia</td>
                <td>Artur Alvim</td>
                <td>2 Anos</td>
                <td>4,9 Estrelas</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="card">
          <img src="../../assets/img/QuemSomos/prof3.png" alt="" />
          <div class="table-wrapper">
            <table class="info">
              <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Unidade</th>
                <th>Anos de atuação</th>
                <th>Nota</th>
              </tr>
              <tr>
                <td>Miguel YuYuHakusho Roxildo</td>
                <td>Cirurgião</td>
                <td>Artur Alvim</td>
                <td>5 Anos</td>
                <td>5,0 Estrelas</td>
              </tr>
            </table>
          </div>
        </div>

        <div class="card">
          <img src="../../assets/img/QuemSomos/prof4.png" alt="" />
          <div class="table-wrapper">
            <table class="info">
              <tr>
                <th>Nome</th>
                <th>Especialidade</th>
                <th>Unidade</th>
                <th>Anos de atuação</th>
                <th>Nota</th>
              </tr>
              <tr>
                <td>Antonia Shouko dos Santos</td>
                <td>Clínico</td>
                <td>Artur Alvim</td>
                <td>9 Anos</td>
                <td>4,1 Estrelas</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <?php
  include_once('../../components/footer.php');
  ?>
</body>

</html>
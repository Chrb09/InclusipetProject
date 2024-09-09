<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleQuemSomos.css" />
  <link rel="stylesheet" href="../../assets/css/StyleQuemSomosInfo.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Vacinação</title>
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
    $sidebarActive = "vacinacao";
    include_once('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include_once('../../components/navmobilequemsomos.php');
      ?>

      <div class="imagem">
        <img src="../../assets/img/QuemSomos/CachorroVacina.png" alt="Cachorro sendo vacinado" />
      </div>
      <div class="titulo">Vacinação</div>
      <div class="text-main">
        <p>
          A vacinação é fundamental para proteger seu animal de estimação contra uma variedade de doenças infecciosas
          graves. Nossa clínica segue os mais recentes protocolos de vacinação, oferecendo imunizações essenciais para
          pets de todas as idades, desde filhotes até animais idosos. Durante a consulta de vacinação, nossos
          veterinários avaliam a saúde geral do seu pet e recomendam um calendário de vacinas adequado às suas
          necessidades específicas.
        </p>
        <br />
        <p>
          Além das vacinas obrigatórias, oferecemos vacinas opcionais para proteger seu pet contra doenças regionais
          ou específicas. Também mantemos registros detalhados de todas as vacinas administradas, garantindo que seu
          animal esteja sempre atualizado. Nosso objetivo é proporcionar uma proteção completa e duradoura,
          contribuindo para a saúde e o bem-estar contínuo do seu pet.
        </p>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <?php
  include_once('../../components/footer.php');
  ?>
</body>

</html>
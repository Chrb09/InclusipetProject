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
  <!-- ICON au-->
  <title>Fisioterapia & Reabilitação</title>
</head>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "quemsomos";
  include('../../components/header.php');
  ?>
  <!--Conteudo-->

  <div class="main">
    <?php
    $sidebarActive = "fisioterapia";
    include('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include('../../components/navmobilequemsomos.php');
      ?>
      <div class="imagem"><img src="../../assets/img/QuemSomos/CachorroFisioterapia.png" /></div>
      <div class="titulo">Fisioterapia & Reabilitação</div>
      <div class="text-main">
        <p>
          Nossa clínica oferece serviços de fisioterapia e reabilitação para ajudar animais de estimação a recuperar a
          mobilidade e melhorar sua qualidade de vida após lesões, cirurgias ou condições crônicas. Utilizamos uma
          variedade de técnicas terapêuticas, incluindo exercícios de fortalecimento, alongamento, hidroterapia e
          terapia a laser, adaptadas às necessidades específicas de cada animal.
        </p>
        <br />
        <p>
          Os programas de reabilitação são personalizados e monitorados de perto por nossos veterinários
          especializados em fisioterapia. Nosso objetivo é reduzir a dor, aumentar a mobilidade e promover a
          recuperação completa do seu pet. Com um enfoque compassivo e profissional, estamos comprometidos em ajudar
          seu animal a voltar à sua rotina normal o mais rápido e confortavelmente possível.
        </p>
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>

</html>
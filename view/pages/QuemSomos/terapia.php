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
  <!-- ICON au -->
  <title>Terapia Comportamental</title>
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
    $sidebarActive = "terapia";
    include('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include('../../components/navmobilequemsomos.php');
      ?>
      <div class="imagem"><img src="../../assets/img/QuemSomos/CachorroTerapia.png" alt="Cachorro na terapia" /></div>
      <div class="titulo">Terapia Comportamental</div>
      <div class="text-main">
        <p>
          Na nossa clínica veterinária, oferecemos terapia comportamental para ajudar a resolver problemas de
          comportamento em animais de estimação. Nossos veterinários especializados realizam avaliações detalhadas
          para identificar as causas subjacentes de comportamentos indesejados, como agressão, ansiedade de separação,
          medo e compulsões.
        </p>
        <br />
        <p>
          Utilizamos técnicas baseadas em reforço positivo e modificação comportamental para desenvolver planos de
          tratamento personalizados. Isso pode incluir treinamento adequado, técnicas de dessensibilização,
          enriquecimento ambiental e aconselhamento para os tutores. Nosso objetivo é promover mudanças positivas no
          comportamento do seu pet, melhorando o relacionamento entre vocês e proporcionando um ambiente mais
          harmonioso em casa.
        </p>
        <br />
        <p>
          Estamos comprometidos em ajudar seu animal a alcançar um comportamento saudável e feliz, proporcionando
          apoio contínuo e orientação para garantir resultados positivos a longo prazo.
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
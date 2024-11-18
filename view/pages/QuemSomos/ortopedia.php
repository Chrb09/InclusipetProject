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
  <title>Ortopedia</title>
</head>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "quemsomos";
  include('../../components/headers/header.php');
  ?>
  <!--Conteudo-->

  <div class="main">
    <?php
    $sidebarActive = "ortopedia";
    include('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include('../../components/navmobilequemsomos.php');
      ?>
      <div class="imagem"><img src="../../assets/img/QuemSomos/CachorroOrtopedia.png" /></div>
      <div class="titulo">Ortopedia</div>
      <div class="text-main">
        <p>
          Nossa clínica oferece serviços especializados em ortopedia veterinária para diagnosticar e tratar problemas
          musculoesqueléticos em animais de estimação. Nossos veterinários são treinados em identificar e tratar
          condições como displasia coxofemoral, luxações patelares, fraturas e artrite. Utilizamos técnicas avançadas
          de diagnóstico, incluindo radiografias e exames de imagem, para avaliar com precisão a condição ortopédica
          do seu pet.
        </p>
        <br />
        <p>
          Oferecemos uma variedade de tratamentos ortopédicos, desde terapias conservadoras, como fisioterapia e
          medicação, até cirurgias corretivas complexas. Após o tratamento ou cirurgia, proporcionamos cuidados
          pós-operatórios e programas de reabilitação personalizados para garantir uma recuperação completa e melhorar
          a mobilidade e qualidade de vida do seu animal. Nosso compromisso é proporcionar o melhor cuidado ortopédico
          possível, assegurando o bem-estar e o conforto do seu pet em todas as etapas do tratamento.
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
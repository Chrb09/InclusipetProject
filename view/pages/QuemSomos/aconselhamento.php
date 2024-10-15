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
  <title>Aconselhamento para Donos</title>
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
    $sidebarActive = "aconselhamento";
    include('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include('../../components/navmobilequemsomos.php');
      ?>
      <div class="imagem"><img src="../../assets/img/QuemSomos/CachorroEVeterinaria.png" /></div>
      <div class="titulo">Aconselhamento para Donos</div>
      <div class="text-main">
        <p>
          Em nossa clínica veterinária, oferecemos aconselhamento especializado para donos de animais de estimação,
          visando promover o bem-estar tanto do animal quanto de seus tutores. Nossos veterinários estão disponíveis
          para discutir questões relacionadas à saúde, comportamento, nutrição e cuidados gerais do seu pet.
        </p>
        <br />
        <p>
          Oferecemos orientações práticas sobre como melhorar a qualidade de vida do seu animal, incluindo dicas de
          manejo, técnicas de treinamento, sugestões para enriquecimento ambiental e recomendações de produtos
          adequados. Estamos aqui para responder suas dúvidas, fornecer suporte emocional e educá-lo sobre as
          necessidades específicas do seu pet.
        </p>
        <br />
        <p>
          Nosso objetivo é fortalecer o vínculo entre você e seu animal de estimação, garantindo que ambos desfrutem
          de uma convivência saudável e feliz. Estamos comprometidos em fornecer o melhor atendimento possível, com
          compaixão e profissionalismo, para ajudá-lo a tomar decisões informadas e promover o bem-estar a longo prazo
          do seu pet.
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
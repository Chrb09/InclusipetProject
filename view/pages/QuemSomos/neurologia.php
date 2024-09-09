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
  <title>Neurologia</title>
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
    $sidebarActive = "neurologia";
    include_once('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include_once('../../components/navmobilequemsomos.php');
      ?>
      <div class="imagem"><img src="../../assets/img/QuemSomos/NeurologiaPet.png" /></div>
      <div class="titulo">Neurologia</div>
      <div class="text-main">
        <p>
          Em nossa clínica, oferecemos serviços especializados em neurologia veterinária para diagnosticar e tratar
          distúrbios neurológicos em animais de estimação. Nossos veterinários são experientes em lidar com condições
          como epilepsia, doenças degenerativas do sistema nervoso, traumas cranianos e hérnias de disco. Utilizamos
          tecnologia avançada, incluindo ressonância magnética e tomografia computadorizada, para diagnósticos
          precisos.
        </p>
        <br />
        <p>
          Após o diagnóstico, desenvolvemos planos de tratamento personalizados que podem incluir terapias
          medicamentosas, cirurgias neurológicas, fisioterapia e acompanhamento especializado. Nosso objetivo é
          proporcionar cuidados compassivos e eficazes, ajudando seu pet a melhorar sua qualidade de vida e recuperar
          funções neurológicas comprometidas. Estamos comprometidos em oferecer suporte contínuo e soluções de
          tratamento avançadas para garantir o bem-estar do seu animal em todas as etapas do tratamento neurológico.
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
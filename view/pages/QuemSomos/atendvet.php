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
  <title>Atendimento Veterinário</title>
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
    $sidebarActive = "atendimento";
    include_once('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include_once('../../components/navmobilequemsomos.php');
      ?>
      <div class="imagem"><img src="../../assets/img/QuemSomos/CachorroAtendimento.png" /></div>
      <div class="titulo">Atendimento Veterinário</div>
      <div class="text-main">
        <p>
          Nosso atendimento veterinário proporciona cuidados abrangentes e personalizados para seu animal de
          estimação. Com uma equipe de veterinários experientes, realizamos consultas de rotina, diagnósticos precisos
          e tratamentos especializados. Estamos disponíveis para emergências 24 horas por dia, garantindo respostas
          rápidas em situações críticas. Priorizamos a prevenção através de check-ups regulares, vacinas e
          desparasitações para manter seu pet saudável ao longo da vida.
        </p>
        <br />
        <p>
          Além dos cuidados na clínica, oferecemos atendimento domiciliar para maior conveniência, proporcionando
          tratamentos no conforto da sua casa. Nosso compromisso é garantir a saúde e o bem-estar do seu pet com
          dedicação, carinho e profissionalismo, assegurando que ele receba o melhor cuidado possível em todas as
          etapas da vida.
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
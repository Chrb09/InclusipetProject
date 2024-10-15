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
  <title>Próteses & Órteses</title>
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
    $sidebarActive = "proteses";
    include('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include('../../components/navmobilequemsomos.php');
      ?>
      <div class="imagem">
        <img src="../../assets/img/QuemSomos/CachorroProtese.png" alt="Cachorro com prótese" />
      </div>
      <div class="titulo">Próteses & Órteses</div>
      <div class="text-main">
        <p>
          Nossa clínica oferece soluções avançadas em próteses e órteses para animais de estimação com necessidades
          especiais, ajudando a melhorar sua mobilidade e qualidade de vida. As próteses são projetadas para
          substituir membros ausentes, enquanto as órteses fornecem suporte adicional a membros debilitados ou
          feridos. Utilizamos materiais de alta qualidade e tecnologias inovadoras para criar dispositivos
          personalizados que se ajustam confortavelmente ao seu pet.
        </p>
        <br />
        <p>
          Nosso processo envolve uma avaliação detalhada para determinar as necessidades específicas do seu animal e o
          desenvolvimento de um dispositivo personalizado. Após a colocação, nossos veterinários fornecem orientação
          sobre eficácia. Com nosso compromisso em fornecer soluções ortopédicas de ponta, estamos aqui para ajudar
          seu pet a o uso e cuidados adequados, além de realizar ajustes conforme necessário para garantir o máximo
          conforto e viver uma vida ativa e saudável.
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
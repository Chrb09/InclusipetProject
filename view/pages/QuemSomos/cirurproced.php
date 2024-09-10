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
  <title>Cirurgias & Procedimentos</title>
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
    $sidebarActive = "cirurgia";
    include('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include('../../components/navmobilequemsomos.php');
      ?>
      <div class="imagem">
        <img src="../../assets/img/QuemSomos/CachorroCirurgia.png" alt="Cachorro no pós-operatório" />
      </div>
      <div class="titulo">Cirurgias & Procedimentos</div>
      <div class="text-main">
        <p>
          Nossa clínica oferece uma ampla gama de cirurgias e procedimentos veterinários, desde castrações e
          esterilizações de rotina até cirurgias mais complexas. Utilizamos técnicas avançadas e equipamentos modernos
          para garantir a segurança e o bem-estar do seu pet durante todo o processo cirúrgico. Nossa equipe de
          veterinários qualificados realiza avaliações pré-operatórias detalhadas para identificar quaisquer riscos e
          elaborar um plano de cirurgia personalizado.
        </p>
        <br />
        <p>
          Durante e após a cirurgia, monitoramos cuidadosamente o seu animal para garantir uma recuperação rápida e
          tranquila. Oferecemos cuidados pós-operatórios abrangentes, incluindo controle da dor, acompanhamento e
          orientações para a recuperação em casa. Nosso compromisso é proporcionar um tratamento cirúrgico de alta
          qualidade com o máximo de cuidado e profissionalismo, assegurando que seu pet receba o melhor atendimento
          possível em todos os momentos.
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
  include('../../components/footer.php');
  ?>
</body>

</html>
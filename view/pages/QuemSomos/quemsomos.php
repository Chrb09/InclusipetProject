<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->

  <link rel="stylesheet" href="../../assets/css/StyleQuemSomos.css" />
  <link rel="stylesheet" href="../../assets/css/StyleSobreNos.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Sobre Nós</title>
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
    $sidebarActive = "quemsomos";
    include('../../components/sidebarquemsomos.php');
    ?>
    <div class="content">
      <?php
      include('../../components/navmobilequemsomos.php');
      ?>
      <div class="sobrenos">
        <div class="container top">
          <div class="titulo">Sobre nós</div>
          <p class="texto__sobrenos">
            Na <strong>Inclusipet</strong>, temos o privilégio de atender animais de todas as habilidades e
            necessidades. Nosso compromisso é ir além, oferecendo cuidados personalizados e adaptados para garantir
            que todos os animais, independentemente de suas limitações físicas, desfrutem de uma vida plena. Com uma
            equipe que possui experiência e sensibilidade para lidar com animais deficientes, proporcionamos serviços
            e instalações adaptadas, como rampas e áreas de reabilitação.
          </p>
          <div class="hr"></div>
        </div>
        <div class="container bottom">
          <div class="titulo">Linha do Tempo</div>
          <div class="timeline">
            <section>
              <div class="section-heading wow fadeIn">
                <div class="heading-separator"></div>
              </div>
              <div class="row">
                <div class="history-wrapper">
                  <div class="title-wrap text-center one-of-two"></div>
                  <div class="timeline-box one-of-two">
                    <div class="content-timeline">
                      <p class="mb-0 text-time">
                        A Clínica Veterinária <strong>Inclusipet</strong> foi criada por um grupo de médicos
                        veterinários com a visão de oferecer cuidados especializados a animais com deficiência.
                      </p>
                    </div>
                    <div class="year">
                      <div class="span">2020</div>
                    </div>
                  </div>
                  <div class="timeline-box one-of-two">
                    <img class="mb-1-6 rounded" src="../../assets/img/QuemSomos/sn1.png" alt="..." />
                    <div class="content-timeline">
                      <p class="mb-0 text-time">
                        Começamos nossa jornada, dedicando-se a prencher uma lacuna crucial na medicina veterinária,
                        concentrando-se no tratamento de animais com deficiência.
                      </p>
                    </div>
                    <div class="year">
                      <div class="span">2021</div>
                    </div>
                  </div>
                  <div class="timeline-box one-of-two">
                    <img class="mb-1-6 rounded" src="../../assets/img/QuemSomos/sn2.png" alt="..." />
                    <div class="content-timeline">
                      <p class="mb-0 text-time">
                        Nossa equipe de profissionais continua trabalhando para desenvolver expertise no tratamento de
                        uma variedade de desafios de saúde enfrentados por todos os animais com necessidades
                        especiais.
                      </p>
                    </div>
                    <div class="year">
                      <div class="span">2022</div>
                    </div>
                  </div>
                  <div class="timeline-box one-of-two">
                    <img class="mb-1-6 rounded" src="../../assets/img/QuemSomos/sn3.png" alt="..." />
                    <div class="content-timeline">
                      <p class="mb-0 text-time">
                        A <strong>Inclusipet</strong> continua a sua missão de oferecer amor, carinho, atenção e
                        cuidados de saúde excepcionais a todos os animais, independentemente de suas limitações,
                        mantendo o compromisso central de sua fundação.
                      </p>
                    </div>
                    <div class="year">
                      <div class="span">2024<br /></div>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div>
        </div>
      </div>
      <!--CODIGO DA PAGINA AQUI-->
    </div>
  </div>
  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>

</html>
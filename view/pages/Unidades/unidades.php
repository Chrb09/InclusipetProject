<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUnidades.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Unidades</title>
</head>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "unidades";
  include('../../components/headers/header.php');

  require_once("../../../controller/DAO/AgendamentoDAO/AgendamentoDAO.php");
  $agendamentoDao = new AgendamentoDAO($conn, $BASE_URL);

  $unidades = $agendamentoDao->getAllUnidade()
    ?>
  <!--Conteudo-->
  <div class="container container__unidades">
    <div class="container">
      <div class="titulo">Unidades</div>
      <div class="hr"></div>
    </div>
    <?php foreach ($unidades as $unidade): ?>
      <div class="cartao__unidades">
        <div class="cartao-body">
          <strong class="cartao-titulo"><?= $unidade[1] ?></strong>
          <div class="cartao-subtitulo">
            <div class="status"></div>
            <div class="texto-subtitulo">Aberto das <?= explode(':00', trim($unidade[5]))[0] ?>h às
              <?= explode(':00', trim($unidade[6]))[0] ?>h
            </div>
          </div>
          <p class="card-text">
            <?= $unidade[2] ?><br />
            <?= $unidade[3] ?><br />
            <?= $unidade[4] ?>
          </p>
        </div>
        <iframe src="<?= $unidade[7] ?>" class="iframe"></iframe>
      </div>
    <?php endforeach; ?>
  </div>
  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>
<script>
  /*
  const cartao1 = document.querySelector(".cartao1");
  const cartao2 = document.querySelector(".cartao2");
  const cartao3 = document.querySelector(".cartao3");
  const data = new Date();
  let hora = data.getHours();
  if (hora > 21 || hora < 8) {
    cartao1.classList.toggle("fechado");
  }
  if (hora > 18 || hora < 8) {
    cartao2.classList.toggle("fechado");
  }
  if (hora > 18 || hora < 10) {
    cartao3.classList.toggle("fechado");
  }
</script>

</html>
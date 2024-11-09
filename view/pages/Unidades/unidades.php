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
      <div class="cartao__unidades" inicial="<?= explode(':', trim($unidade[5]))[0] ?>"
        final="<?= explode(':', trim($unidade[6]))[0] ?>">
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

  const cartoes = document.getElementsByClassName("cartao__unidades");

  const data = new Date();
  let hora = data.getHours();

  for (let cartao of cartoes) {
    if (hora => cartao.getAttribute("final") || hora <= cartao.getAttribute("inicial")) {
      cartao.classList.toggle("fechado");
    }
  }







</script>

</html>
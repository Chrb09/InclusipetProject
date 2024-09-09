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
  include_once('../../components/header.php');
  ?>
  <!--Conteudo-->
  <div class="container container__unidades">
    <div class="container">
      <div class="titulo">Unidades</div>
      <div class="hr"></div>
    </div>
    <div class="cartao__unidades cartao1">
      <div class="cartao-body">
        <strong class="cartao-titulo">Inclusipet - Guarulhos</strong>
        <div class="cartao-subtitulo">
          <div class="status"></div>
          <div class="texto-subtitulo">Aberto das 8h às 21h</div>
        </div>
        <p class="card-text">
          R. Conceição da Feira<br />
          Jardim pres. dutra - SP<br />
          (11) 11111-1111
        </p>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3660.9433340295095!2d-46.433593725612525!3d-23.426414056646507!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce89f1b8bcf965%3A0xff24a059d917838b!2sR.%20Concei%C3%A7%C3%A3o%20da%20Feira%20-%20Jardim%20Pres.%20Dutra%2C%20Guarulhos%20-%20SP%2C%2007173-010!5e0!3m2!1spt-BR!2sbr!4v1697764260412!5m2!1spt-BR!2sbr"
        class="iframe"></iframe>
    </div>
    <div class="cartao__unidades cartao2">
      <div class="cartao-body">
        <strong class="cartao-titulo">Inclusipet - Vila Cisper</strong>
        <div class="cartao-subtitulo">
          <div class="status"></div>
          <div class="texto-subtitulo">Aberto das 8h às 18h</div>
        </div>
        <p class="card-text">
          R. Cícero Dantas<br />
          Vila Cisper - SP<br />
          (11) 22222-2222
        </p>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3658.9811661599797!2d-46.497951325609456!3d-23.497187859235876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce605e5a1481e3%3A0xb0cd6094d2133515!2sR.%20C%C3%ADcero%20Dantas%20-%20Ermelino%20Matarazzo%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2003818-130!5e0!3m2!1spt-BR!2sbr!4v1697773935746!5m2!1spt-BR!2sbr"
        class="iframe"></iframe>
    </div>
    <div class="cartao__unidades cartao3">
      <div class="cartao-body">
        <strong class="cartao-titulo">Inclusipet - Artur Alvim</strong>
        <div class="cartao-subtitulo">
          <div class="status"></div>
          <div class="texto-subtitulo">Aberto das 10h as 18h</div>
        </div>
        <p class="card-text">
          Av. Líder<br />
          Artur Alvim - SP<br />
          (11) 33333-3333
        </p>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3657.369311320792!2d-46.47061682560695!3d-23.555176061363234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce66e1dbe1105b%3A0xb388139f5d5c5750!2sAv.%20L%C3%ADder%20-%20Artur%20Alvim%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1697774090354!5m2!1spt-BR!2sbr"
        class="iframe"></iframe>
    </div>
  </div>
  <!-- FOOTER -->
  <?php
  include_once('../../components/footer.php');
  ?>
</body>
<script>
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
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Créditos</title>
</head>
<style>
  .titulo {
    margin-bottom: 1em;
  }

  .container-main {
    text-align: center;
    padding-block: 3rem;
  }

  .grid-creditos {
    margin-bottom: 2em;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1em;
  }

  ins {
    color: var(--purple);
    font-weight: 600;
    font-size: 1.1em;
  }

  .dev img {
    width: 10rem;
    border-radius: 1rem;
  }

  .dev {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 0.75em;
    text-align: center;
    max-width: 13em;
  }
</style>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "contato";
  include('../../components/headers/header.php');

  ?>

  <!-- CONTATOS -->
  <div class="container container-main">
    <div class="titulo">Desenvolvedores</div>
    <div class="grid-creditos">
      <div class="dev">
        <img src="https://avatars.githubusercontent.com/u/138123400?v=4" alt="" />
        <div class="dev-info">
          <ins><a href="https://github.com/Amanda093">Amanda</a></ins>
          <p>Código, Design, Conteúdo, Documentação</p>
        </div>
      </div>
      <div class="dev">
        <img src="https://avatars.githubusercontent.com/u/133404301?v=4" alt="" />
        <div class="dev-info">
          <ins><a href="https://github.com/Beatriz02020">Beatriz</a></ins>
          <p>Código, Conteúdo, Documentação, Responsividade</p>
        </div>
      </div>
      <div class="dev">
        <img src="https://avatars.githubusercontent.com/u/142687809?v=4" alt="" />
        <div class="dev-info">
          <ins><a href="https://github.com/BernardoVxexra">Bernardo</a></ins>
          <p>Código, Conteúdo, Documentação</p>
        </div>
      </div>
      <div class="dev">
        <img src="https://avatars.githubusercontent.com/u/132484542?v=4" alt="" />
        <div class="dev-info">
          <ins><a href="https://github.com/Chrb09">Carlos</a></ins>
          <p>Código, Design, Conteúdo, Documentação, Responsividade, App</p>
        </div>
      </div>
      <div class="dev">
        <img src="https://avatars.githubusercontent.com/u/133404091?v=4" alt="" />
        <div class="dev-info">
          <ins><a href="https://github.com/GiovannaAdantas">Giovanna</a></ins>
          <p>Design, Conteúdo, Documentação</p>
        </div>
      </div>
    </div>
    <button class="botao-solido" onclick="location.href='contato.php'" type="button">Voltar</button>
  </div>
  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>

</html>
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
  .container-main {
    text-align: center;
    display: flex;
    flex-direction: column;
    gap: 4em;
    justify-content: center;
    align-items: center;
    padding-block: 3rem;
  }

  .botao-borda {
    width: 100%;
    max-width: 15rem;
  }

  body {
    padding-bottom: 0rem !important;
  }

  .dev {
    display: flex;
    gap: 5%;
    width: 100%;
  }

  .foto-dev {
    width: 18%;
    border-radius: 1.5em;
  }

  .dev-info {
    width: 77%;
    display: flex;
    flex-direction: column;
    gap: 0.75em;
    align-items: start;
    justify-content: center;
  }

  .linha-github {
    display: flex;
    gap: 6%;
  }

  .linha-github a {
    width: 47%;
  }

  .voltar {
    text-align: left;
    width: 100%;
    font-size: 1.5em;
    margin-bottom: 1em;
    display: flex;
    align-items: center;
    gap: 0.4em;
    transition: gap 0.3s;
  }

  .voltar:hover {
    gap: 0.55em;
  }

  .seta__link {
    font-size: 0.6em;
    transform: rotate(180deg);
  }

  .link-dev {
    display: flex;
    gap: 0.75em;
  }

  .link-dev a {
    transition: transform 0.25s;

    &:hover {
      transform: translate(0, -4px);
    }
  }

  .right {
    flex-direction: row-reverse;
    justify-content: end;
  }

  .right .dev-info {
    align-items: end;
  }

  .img-link {
    width: 3.25em;
  }

  .inclusipet {
    width: 100%;
    max-width: 45rem;
  }

  .linguagens {
    width: 100%;
    max-width: 50rem;
  }

  .fotoIntegrantes {
    width: 100%;
    max-width: 70rem;
  }

  @media (max-width: 768px) {
    .linha-github {
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 1rem;
    }

    .linha-github a {
      width: 80%;
    }

    .dev {
      flex-direction: column;
      align-items: center;
    }

    .dev-info {
      align-items: center !important;
    }
  }

  @media (max-width: 640px) {
    .foto-dev {
      width: 40%;
      border-radius: 1.5em;
    }
  }
</style>

<body>
  <!-- HEADER-->
  <?php

  require_once('../../../model/Arquivo/Inicializacao/globals.php');
  require_once('../../../model/Arquivo/Inicializacao/db.php');
  require_once('../../../model/Classes/Modelagem/Message.php');
  require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');
  require_once('../../../controller/DAO/FuncionarioDAO/FuncionarioDAO.php');

  $message = new Message($BASE_URL);
  $flassMessage = $message->getMessage();

  if (!empty($flassMessage["msg"])) {
    $message->clearMessage();
  }

  // cliente
  $clienteDao = new ClienteDAO($conn, $BASE_URL);
  $clienteData = $clienteDao->verifyToken(false);

  // funcionario
  $funcionarioDao = new FuncionarioDAO($conn, $BASE_URL);
  $funcionarioData = $funcionarioDao->verifyToken(false);

  ?>



  <!-- CONTATOS -->
  <div class="container container-main">
    <a href="contato.php" class="titulo voltar">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="seta__link">
        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
      </svg>
      Créditos
    </a>
    <img src="../../assets/img/Contato/inclusipetDevices.png" alt="" class="inclusipet">
    <img src="../../assets/img/Contato/linguagens.png" alt="" class="linguagens">
    <img src="../../assets/img/Contato/foto.png" alt="" class="fotoIntegrantes">
    <div class="dev">
      <img src="../../assets/img/Contato/1.png" class="foto-dev" alt="" />
      <div class="dev-info">
        <div class="titulo">Amanda</div>
        <p>Código, Design, Conteúdo, Documentação</p>
        <div class="link-dev">
          <a href="https://github.com/Amanda093">
            <img src="../../assets/img/Contato/github.png" alt="" class="img-link">
          </a>
          <a href="">
            <img src="../../assets/img/Contato/linkedin.png" alt="" class="img-link">
          </a>
        </div>
      </div>
    </div>
    <div class="dev right">
      <img src="../../assets/img/Contato/2.png" class="foto-dev" alt="" />
      <div class="dev-info">
        <div class="titulo">Beatriz</div>
        <p>Código, Conteúdo, Documentação, Responsividade</p>
        <div class="link-dev">
          <a href="https://github.com/Beatriz02020">
            <img src="../../assets/img/Contato/github.png" alt="" class="img-link">
          </a>
          <a href="">
            <img src="../../assets/img/Contato/linkedin.png" alt="" class="img-link">
          </a>
        </div>
      </div>
    </div>
    <div class="dev">
      <img src="../../assets/img/Contato/3.png" class="foto-dev" alt="" />
      <div class="dev-info">
        <div class="titulo">Bernardo</div>
        <p>Código, Conteúdo, Documentação</p>
        <div class="link-dev">
          <a href="https://github.com/BernardoVxexra">
            <img src="../../assets/img/Contato/github.png" alt="" class="img-link">
          </a>
          <a href="">
            <img src="../../assets/img/Contato/linkedin.png" alt="" class="img-link">
          </a>
        </div>
      </div>
    </div>
    <div class="dev right">
      <img src="../../assets/img/Contato/4.png" class="foto-dev" alt="" />
      <div class="dev-info">
        <div class="titulo">Carlos</div>
        <p>Código, Design, Conteúdo, Documentação, Responsividade, App</p>
        <div class="link-dev">
          <a href="https://github.com/Chrb09">
            <img src="../../assets/img/Contato/github.png" alt="" class="img-link">
          </a>
          <a href="">
            <img src="../../assets/img/Contato/linkedin.png" alt="" class="img-link">
          </a>
        </div>
      </div>
    </div>
    <div class="dev">
      <img src="../../assets/img/Contato/5.png" class="foto-dev" alt="" />
      <div class="dev-info">
        <div class="titulo">Giovanna</div>
        <p>Design, Conteúdo, Documentação</p>
        <div class="link-dev">
          <a href="https://github.com/GioAndradeD">
            <img src="../../assets/img/Contato/github.png" alt="" class="img-link">
          </a>
          <a href="">
            <img src="../../assets/img/Contato/linkedin.png" alt="" class="img-link">
          </a>
        </div>
      </div>
    </div>
    <div class="linha-github">
      <a href="https://github.com/Chrb09/InclusipetProject">
        <img src="../../assets/img/Contato/site.png" alt="">
      </a>
      <a href="https://github.com/Chrb09/InclusipetProject_Mobile">
        <img src="../../assets/img/Contato/app.png" alt="">
      </a>
    </div>
    <button class="botao-borda" onclick="location.href='contato.php'" type="button">Voltar</button>
  </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  const Toast = Swal.mixin({
    toast: true,
    position: 'bottom-right',
    iconColor: 'white',
    customClass: {
      popup: 'colored-toast',
    },
    showConfirmButton: false,
    timer: 6500,
    timerProgressBar: true,
  })
</script>

<?php if (!empty($flassMessage["msg"])) {
  if ($flassMessage['format'] == "toast") {
    ?>
    <script type="text/javascript">
      Toast.fire({
        icon: "<?= $flassMessage["type"] ?>",
        title: "<?= $flassMessage["msg"] ?>",
      })
    </script>
    <?php
  } else if ($flassMessage['format'] == "popup") {
    ?>
      <script type="text/javascript">
        Swal.fire({
          html: `<div><p for="" > <?= $flassMessage["msg"] ?></p></div> `,
          showConfirmButton: true,
          icon: "<?= $flassMessage["type"] ?>",
          focusConfirm: true,
          customClass: {
            popup: 'container-custom',
          },
          backdrop: "rgb(87, 77, 189, 0.5",
        });
      </script>
    <?php
  }
}
?>

</html>
<?php

  require_once('../../../model/globals.php');
  require_once('../../../model/db.php');
  require_once('../../../model/Classes/Message.php');
  require_once('../../../controller/ClienteDAO.php');

  $message = new Message($BASE_URL);
  $flassMessage = $message->getMessage();

  if(!empty($flassMessage["msg"])){
      $message->clearMessage();
  }

  $clienteDao = new ClienteDAO($conn, $BASE_URL);
  $clienteData = $clienteDao->verifyToken(false);
  
?>

<header class="header">
  <div class="container container__header">
    <a href="../index/index.php">
      <img src="../../assets/img/Outros/inclusipet.png" alt="Logo Inclusipet" class="logo__header" />
    </a>
    <ul class="menu__header">
      <li>
        <a href="../QuemSomos/quemsomos.php" class="links__header <?php if ($activePage == 'quemsomos') {
          echo 'pagatual';
        } else {
          echo 'a-under ';
        } ?>">Quem Somos</a>
      </li>
      <li>
        <a href="../Unidades/unidades.php" class="links__header <?php if ($activePage == 'unidades') {
          echo 'pagatual';
        } else {
          echo 'a-under ';
        } ?>"">Unidades</a>
      </li>
      <li>
        <a href=" ../Blog/blog.php" class="links__header <?php if ($activePage == 'blog') {
          echo 'pagatual';
        } else {
          echo 'a-under ';
        } ?>"">Blog</a>
      </li>
      <li>
        <a href=" ../Adocao/adocao.php" class="links__header <?php if ($activePage == 'adocao') {
          echo 'pagatual';
        } else {
          echo 'a-under ';
        } ?>"">Adoção</a>
      </li>
      <li>
        <a href=" ../Contato/contato.php" class="links__header <?php if ($activePage == 'contato') {
          echo 'pagatual';
        } else {
          echo 'a-under ';
        } ?>"">Contato</a>
      </li>
      <li>
        <a href=" ../Login/login.php"><img src="../../assets/img/Login/login.png" alt="Login"
            class="login__header" /></a>
      </li>
    </ul>
    <button class="barra__header">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </button>
    <div class="dropdown__header">
      <li>
        <a href="../QuemSomos/quemsomos.php" class="links__header">Quem Somos</a>
      </li>
      <li>
        <a href="../Unidades/unidades.php" class="links__header">Unidades</a>
      </li>
      <li>
        <a href="../Blog/blog.php" class="links__header">Blog</a>
      </li>
      <li>
        <a href="../Adocao/adocao.php" class="links__header">Adoção</a>
      </li>
      <li>
        <a href="../Contato/contato.php" class="links__header">Contato</a>
      </li>
      <li>
        <div class="botao-solido-branco" onclick="location.href='../Login/login.php'" type="button">Login</div>
      </li>
    </div>
  </div>
</header>
<script src="../../assets/js/dropdown_header.js"></script>

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
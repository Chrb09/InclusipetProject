<?php

require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Message.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

$message = new Message($BASE_URL);
$flassMessage = $message->getMessage();

if (!empty($flassMessage["msg"])) {
  $message->clearMessage();
}

// cliente
$clienteDao = new ClienteDAO($conn, $BASE_URL);
$clienteData = $clienteDao->verifyToken(true);

if ($clienteData) {
  if ($clienteData->imagem == "") {
    $clienteData->imagem = "user.png";
  }
  $primeiroNome = explode(' ', trim($clienteData->nome));
}

?>

<div class="container header-perfil header-pc">
  <a href="../index/index.php">
    <img src="../../assets/img/Perfil/inclusipet.png" alt="Logo Inclusipet" class="logo__header" />
  </a>
  <div class="linha">
    <div class="linha-links">
      <a href="../QuemSomos/quemsomos.php" class="links__header a-under">Quem Somos</a>
      <a href="../Unidades/unidades.php" class="links__header a-under">Unidades</a>
      <a href="../Blog/blog.php" class="links__header a-under">Blog</a>
      <a href="../Adocao/adocao.php" class="links__header a-under">Adoção</a>
      <a href="../Contato/contato.php" class="links__header a-under">Contato</a>
    </div>
    |
    <div class="linha">
      <?php if ($clienteData): ?>
        <!-- caso esteja logado -->
        <a href=" ../Perfil/perfil.php" class="a-logado"><?= $primeiroNome[0] ?>
          <img src="../../assets/img/ImagensPerfil/<?= $clienteData->imagem ?>" alt="Login" class="login__header" />
        </a>
      <?php else: ?>
        <a href=" ../Login/login.php"><img src="../../assets/img/Login/login.png" alt="Login" class="login__header" /></a>
      <?php endif; ?>
    </div>
  </div>
</div>

<div class="container header-perfil header-mobile">
  <a a href="../index/index.php">
    <img src="../../assets/img/Perfil/inclusipet.png" alt="Logo Inclusipet" class="logo__header" />
  </a>
  <div class="linha">
    <div class="linha">
      <?php if ($clienteData): ?>
        <!-- caso esteja logado -->
        <a href=" ../Perfil/perfil.php" class="a-logado"><?= $primeiroNome[0] ?>
          <img src="../../assets/img/ImagensPerfil/<?= $clienteData->imagem ?>" alt="Login" class="login__header" />
        </a>
      <?php else: ?>
        <a href=" ../Login/login.php"><img src="../../assets/img/Login/<" alt="Login" class="login__header" /></a>
      <?php endif; ?>
    </div>
  </div>
</div>

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
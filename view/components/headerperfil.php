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
      <?php if ($user == 0) {
        echo '<img src="../../assets/img/Perfil/foto_usuario.png" alt="Login" class="login__header" />
      <a href="perfil.php" class="login__name">Nome do Usuario</a>';
      } elseif ($user == 1) {
        echo '<img src="../../assets/img/QuemSomos/prof3.png" alt="Login" class="login__header" />
        <a href="perfil.php" class="login__name">Nome do Funcionario</a>';
      }
      ?>
    </div>
  </div>
</div>

<div class="container header-perfil header-mobile">
  <a a href="../index/index.php">
    <img src="../../assets/img/Perfil/inclusipet.png" alt="Logo Inclusipet" class="logo__header" />
  </a>
  <div class="linha">
    <div class="linha">
      <?php if ($user == 0) {
        echo '<img src="../../assets/img/Perfil/foto_usuario.png" alt="Login" class="login__header" />
      <a href="perfil.php" class="login__name">Nome do Usuario</a>';
      } elseif ($user == 1) {
        echo '<img src="../../assets/img/QuemSomos/prof3.png" alt="Login" class="login__header" />
        <a href="perfil.php" class="login__name">Nome do Funcionario</a>';
      }
      ?>
    </div>
  </div>
</div>
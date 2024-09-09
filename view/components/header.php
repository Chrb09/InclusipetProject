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
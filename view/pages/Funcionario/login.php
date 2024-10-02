<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleLoginVet.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Login</title>
</head>

<body>
  <!-- HEADER-->
  <header class="header">
    <div class="container container__header">
      <a href="../../index.php">
        <img src="../../assets/img/Outros/inclusipet.png" alt="Logo Inclusipet" class="logo__header" />
      </a>
      <ul class="menu__header">
        <li>
          <a href="../QuemSomos/quemsomos.php" class="links__header a-under">Quem Somos</a>
        </li>
        <li>
          <a href="../Unidades/unidades.php" class="links__header a-under">Unidades</a>
        </li>
        <li>
          <a href="../Blog/blog.php" class="links__header a-under">Blog</a>
        </li>
        <li>
          <a href="../Adocao/adocao.php" class="links__header a-under">Adoção</a>
        </li>
        <li>
          <a href="../Contato/contato.php" class="links__header a-under">Contato</a>
        </li>
        <li>
          <a href="../Login/login.php"><img src="../../assets/img/Login/login.png" alt="Login"
              class="login__header" /></a>
        </li>
      </ul>
      <button class="barra__header">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
          stroke="currentColor">
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

  <!-- LOGIN -->
  <div class="container-login">
    <form class="container-form" action="#">
      <div class="form-content">
        <div class="titulo">Sistema do Veterinario</div>
        <label for="log-in-email">Código de acesso</label>
        <input name="log-in-email" type="text" required autocomplete="on" />
        <label for="log-in-password">Senha</label>
        <input name="log-in-password" type="password" required autocomplete="on" />
        <button class="botao-solido" onclick="location.href='perfil.php'" type="button">Entre</button>
        <ins><a href="../Login/login.html">Login Usuario</a></ins>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
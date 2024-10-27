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
  <?php include('../../components/headers/header.php'); ?>

  <!-- LOGIN -->
  <div class="container-login">
  <form action="../../../model/Arquivo/Inicializacao/auth_process.php" 
  method="POST">
  <input type="hidden" name="type" value="login_funcionario">
      <div class="form-content">
        <div class="titulo">Sistema do Funcionário</div>

        <!--CodFuncionario-->
        <label for="log-in-cod">Código de acesso</label>
        <input name="log-in-cod" id="log-in-cod" type="text" required autocomplete="on" placeholder="Digite seu código de acesso" />
       
        <!--Senha-->
        <label for="log-in-password">Senha</label>
        <input name="log-in-password" id="log-in-password" type="password" required autocomplete="on" placeholder="Sua senha..." />
        
        <!--Senha-->
        <button class="botao-solido" onclick="location.href='perfil.php'" type="button">Entre</button>
        
        <!--Retorno ao login usuário-->
        <ins><a href="../Login/login.php">Login Usuário</a></ins>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>
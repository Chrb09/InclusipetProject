<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleLogin.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Login</title>
</head>

<body>
  <!-- HEADER-->
  <?php include('../../components/header.php'); ?>

  <!-- LOGIN -->
  <div class="container-login" id="container-login">
    <div class="form-container sign-up-container">
      <form action="#" id="sign-up-form" class="">
        <div class="form-content cadastrar1">
          <div class="titulo">Cadastrar-se</div>
          <label for="sign-up-email">Email</label>
          <input name="sign-up-email " type="email" required autocomplete="off" />
          <label for="sign-up-password">Senha</label>
          <input name="sign-up-password " type="password" required autocomplete="off" />
          <button class="botao-solido" onclick="cadastrarnext()" type="button">Continuar</button>
          <button class="botao-borda" onclick="" type="button">
            <svg id="Layer_1" style="enable-background: new 0 0 56.6934 56.6934" version="1.1"
              viewBox="0 0 56.6934 56.6934" width="56.6934px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" class="svggoogle">
              <path
                d="M51.981,24.4812c-7.7173-0.0038-15.4346-0.0019-23.1518-0.001c0.001,3.2009-0.0038,6.4018,0.0019,9.6017  c4.4693-0.001,8.9386-0.0019,13.407,0c-0.5179,3.0673-2.3408,5.8723-4.9258,7.5991c-1.625,1.0926-3.492,1.8018-5.4168,2.139  c-1.9372,0.3306-3.9389,0.3729-5.8713-0.0183c-1.9651-0.3921-3.8409-1.2108-5.4773-2.3649  c-2.6166-1.8383-4.6135-4.5279-5.6388-7.5549c-1.0484-3.0788-1.0561-6.5046,0.0048-9.5805  c0.7361-2.1679,1.9613-4.1705,3.5708-5.8002c1.9853-2.0324,4.5664-3.4853,7.3473-4.0811c2.3812-0.5083,4.8921-0.4113,7.2234,0.294  c1.9815,0.6016,3.8082,1.6874,5.3044,3.1163c1.5125-1.5039,3.0173-3.0164,4.527-4.5231c0.7918-0.811,1.624-1.5865,2.3908-2.4196  c-2.2928-2.1218-4.9805-3.8274-7.9172-4.9056C32.0723,4.0363,26.1097,3.995,20.7871,5.8372  C14.7889,7.8907,9.6815,12.3763,6.8497,18.0459c-0.9859,1.9536-1.7057,4.0388-2.1381,6.1836  C3.6238,29.5732,4.382,35.2707,6.8468,40.1378c1.6019,3.1768,3.8985,6.001,6.6843,8.215c2.6282,2.0958,5.6916,3.6439,8.9396,4.5078  c4.0984,1.0993,8.461,1.0743,12.5864,0.1355c3.7284-0.8581,7.256-2.6397,10.0725-5.24c2.977-2.7358,5.1006-6.3403,6.2249-10.2138  C52.5807,33.3171,52.7498,28.8064,51.981,24.4812z" />
            </svg>
            Continuar com Google
          </button>
          <p>
            Já possui uma conta?
            <a class="" id="signIn">Entre</a>
          </p>
        </div>
        <div class="form-content cadastrar2">
          <div class="titulo">Finalizar Cadastro</div>
          <label for="sign-up-name">Nome Completo</label>
          <input name="sign-up-name " placeholder="Seu Nome..." type="text" required autocomplete="off" />
          <label for="sign-up-date">Data de Nascimento</label>
          <input name="sign-up-date " type="date" required autocomplete="off" />
          <label for="sign-up-cpf">CPF</label>
          <input name="sign-up-cpf" id="sign-up-cpf" placeholder="000.000.000-00" type="text" required
            autocomplete="off" />
          <label for="sign-up-cep">CEP</label>
          <input name="sign-up-cep" id="sign-up-cep" placeholder="00000-000" type="text" required autocomplete="off" />
          <label for="sign-up-tel">Telefone</label>
          <input name="sign-up-tel" id="sign-up-tel" placeholder="(00)00000-0000" type="text" required
            autocomplete="off" />
          <button class="botao-solido" onclick="location.href='../Perfil/perfil.php'" type="submit">
            Concluir Cadastro
          </button>
          <button class="botao-borda" onclick="cadastrarnext()" type="button">Voltar</button>
        </div>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form action="#">
        <div class="form-content">
          <div class="titulo">Entrar</div>
          <label for="log-in-email">Email</label>
          <input name="log-in-email" type="email" required autocomplete="on" />
          <label for="log-in-password">Senha</label>
          <input name="log-in-password" type="password" required autocomplete="on" />
          <button class="botao-solido" onclick="location.href='../Perfil/perfil.php'" type="button">Entre</button>
          <button class="botao-borda" onclick="" type="button">
            <svg id="Layer_1" style="enable-background: new 0 0 56.6934 56.6934" version="1.1"
              viewBox="0 0 56.6934 56.6934" width="56.6934px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" class="svggoogle">
              <path
                d="M51.981,24.4812c-7.7173-0.0038-15.4346-0.0019-23.1518-0.001c0.001,3.2009-0.0038,6.4018,0.0019,9.6017  c4.4693-0.001,8.9386-0.0019,13.407,0c-0.5179,3.0673-2.3408,5.8723-4.9258,7.5991c-1.625,1.0926-3.492,1.8018-5.4168,2.139  c-1.9372,0.3306-3.9389,0.3729-5.8713-0.0183c-1.9651-0.3921-3.8409-1.2108-5.4773-2.3649  c-2.6166-1.8383-4.6135-4.5279-5.6388-7.5549c-1.0484-3.0788-1.0561-6.5046,0.0048-9.5805  c0.7361-2.1679,1.9613-4.1705,3.5708-5.8002c1.9853-2.0324,4.5664-3.4853,7.3473-4.0811c2.3812-0.5083,4.8921-0.4113,7.2234,0.294  c1.9815,0.6016,3.8082,1.6874,5.3044,3.1163c1.5125-1.5039,3.0173-3.0164,4.527-4.5231c0.7918-0.811,1.624-1.5865,2.3908-2.4196  c-2.2928-2.1218-4.9805-3.8274-7.9172-4.9056C32.0723,4.0363,26.1097,3.995,20.7871,5.8372  C14.7889,7.8907,9.6815,12.3763,6.8497,18.0459c-0.9859,1.9536-1.7057,4.0388-2.1381,6.1836  C3.6238,29.5732,4.382,35.2707,6.8468,40.1378c1.6019,3.1768,3.8985,6.001,6.6843,8.215c2.6282,2.0958,5.6916,3.6439,8.9396,4.5078  c4.0984,1.0993,8.461,1.0743,12.5864,0.1355c3.7284-0.8581,7.256-2.6397,10.0725-5.24c2.977-2.7358,5.1006-6.3403,6.2249-10.2138  C52.5807,33.3171,52.7498,28.8064,51.981,24.4812z" />
            </svg>
            Entre com Google
          </button>
          <p>
            Ainda não possui uma conta?
            <a class="" id="signUp">Cadastre-se</a>
          </p>
          <ins><a href="../Funcionario/login.php">Login Funcionario</a></ins>
        </div>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay"></div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="../../assets/js/login_slider.js"></script>
</body>

</html>
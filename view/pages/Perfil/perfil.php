<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StylePerfil.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Perfil</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php
    $user = 0;
    $sidebarActive = "perfil";
    include('../../components/sidebarperfil.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfil.php'); ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>

        <!-- Conteudo principal -->
        <div class="titulo">Perfil</div>

        <div class="usuario" id="usuario">
          <div class="foto-edit">
            <div class="foto-edit-wrapper">
              <img src="../../assets/img/Perfil/foto_usuario.png" alt="Foto do pet" class="foto-edit-img" />
              <div class="edit">
                <img src="../../assets/img/Perfil/editar_icon.png" alt="" />
              </div>
            </div>
            <ins><a href="">Alterar Senha</a></ins>
          </div>
          <div class="info_usuario">
            <table class="info-table">
              <tr>
                <th>Nome Completo:</th>
                <td>Miguel Yudi Baba</td>
              </tr>
              <tr>
                <th>Data Nascimento:</th>
                <td>11/04/2004</td>
              </tr>
              <tr>
                <th>Email:</th>
                <td>hatsunemikulover@gmail.com</td>
              </tr>
              <tr>
                <th>Telefone:</th>
                <td>+11 91234-5678</td>
              </tr>
              <tr>
                <th>CEP/CPF:</th>
                <td>69093-809 / 252.910.260-06</td>
              </tr>
            </table>

            <div class="linha">
              <button class="botao-solido editar-button" onclick="usuarioedit()" type="button">
                <img src="../../assets/img/Perfil/editar_icon.png" alt="" />Editar
              </button>
              <button class="botao-solido sair-button" onclick="" type="button">
                <img src="../../assets/img/Perfil/sair.png" alt="" />Sair
              </button>
            </div>
          </div>
          <form action="" class="form__cadastro">
            <div class="form-input">
              <label for="sign-up-name">Nome Completo</label>
              <input name="sign-up-name " placeholder="Seu Nome..." type="text" required autocomplete="off" />
            </div>
            <div class="form-input">
              <label for="sign-up-date">Data de Nascimento</label>
              <input name="sign-up-date " type="date" required autocomplete="off" />
            </div>
            <div class="form-input">
              <label for="sign-up-email">Email</label>
              <input name="sign-up-email " placeholder="Seu email..." type="email" required autocomplete="off" />
            </div>
            <div class="form-input">
              <label for="sign-up-tel">Telefone</label>
              <input name="sign-up-tel" id="sign-up-tel" placeholder="(00)00000-0000" type="text" required
                autocomplete="off" />
            </div>
            <div class="form-input desativado">
              <label for="sign-up-cep">CEP</label>
              <input name="sign-up-cep" id="sign-up-cep" placeholder="00000-000" type="text" disabled
                autocomplete="off" />
            </div>
            <div class="form-input desativado">
              <label for="sign-up-cpf">CPF</label>
              <input name="sign-up-cpf" id="sign-up-cpf" placeholder="000.000.000-00" type="text" disabled
                autocomplete="off" />
            </div>
            <div class="form-input"></div>
            <div class="form-msg">Para alterar seu CEP ou CPF entre em contato.</div>
            <div class="button-wrapper-form">
              <button class="botao botao-borda" onclick="usuarioedit()" type="button">Voltar</button>
              <button class="botao botao-solido" onclick="usuarioedit()" type="button">Salvar</button>
            </div>
          </form>
        </div>
        <br />
        <br />
        <div class="acoes">
          <a class="nav-perfil" href="agendamento.php"><img src="../../assets/img/Perfil/agendar.png" alt="" />
            <div class="card-txt">
              <p>Agendar</p>
              <strong>Consulta</strong>
            </div>
          </a>
          <a class="nav-perfil" href="anuncioadocao.php"><img src="../../assets/img/Perfil/anunciar.png" alt="" />
            <div class="card-txt">
              <p>Criar anuncio de</p>
              <strong>Adoção</strong>
            </div>
          </a>
          <a class="nav-perfil" href="cadastraranimal.php"><img src="../../assets/img/Perfil/cadastrar.png" alt="" />
            <div class="card-txt">
              <p>Cadastrar</p>
              <strong>Animal</strong>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>

</html>
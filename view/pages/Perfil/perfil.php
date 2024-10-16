<?php

require_once('../../../model/Arquivo/inicializacao/globals.php');
require_once('../../../model/Arquivo/inicializacao/db.php');
require_once('../../../model/Classes/Modelagem/Message.php');
require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

$cliente = new Cliente();
$clienteDao = new ClienteDAO($conn, $BASE_URL);

$clienteData = $clienteDao->verifyToken(true);
$fullName = $cliente->getFullName($clienteData);

if ($clienteData->imagem == "") {
  $clienteData->imagem = "user.png";
}

?>
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
  <style>
    .container-input {
      width: 25rem;
      border-radius: 1rem;
      padding-inline: 0.5em;
      padding-block: 1em;
      font-size: inherit;
    }

    .container-input .titulo-sweetalert {
      color: var(--purple);
      width: 100%;
      text-align: left;
    }

    .container-input .form-sweetalert {
      width: 100%;
      display: flex;
      text-align: left;
      flex-direction: column;
      gap: 2rem;
    }

    .container-input .input-sweetalert {
      display: flex;
      flex-direction: column;
      gap: 0.5em;
    }

    .container-input .linha-sweetalert {
      width: 100%;
      display: flex;
      flex-direction: row !important;
      justify-content: center;
      align-items: center;
      gap: 1em;
    }
  </style>
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
            <ins><a href="#" id="alterarsenha">Alterar Senha</a></ins>
          </div>
          <div class="info_usuario">
            <table class="info-table">
              <tr>
                <th>Nome Completo:</th>
                <td><?= $clienteData->nome ?></td> <!-- Nome Completo do cliente -->
              </tr>
              <tr>
                <th>Data Nascimento:</th>
                <td><?= $clienteData->datanasc ?></td> <!-- Data de nascimento do cliente -->
              </tr>
              <tr>
                <th>Email:</th>
                <td><?= $clienteData->email ?></td> <!-- Email do cliente -->
              </tr>
              <tr>
                <th>Telefone:</th>
                <td><?= $clienteData->telefone ?></td> <!-- Telefone do cliente -->
              </tr>
              <tr>
                <th>CEP/CPF:</th>
                <td><?= $clienteData->cep ?> / <?= $clienteData->cpf ?></td> <!-- Cep e Cpf do cliente -->
              </tr>
            </table>

            <div class="linha">
              <button class="botao-solido editar-button" onclick="usuarioedit()" type="button">
                <img src="../../assets/img/Perfil/editar_icon.png" alt="" />Editar
              </button>

              <a href="../../../model/Arquivo/Inicializacao/logout.php">
                <button class="botao-solido sair-button" onclick="" type="button">
                  <img src="../../assets/img/Perfil/sair.png" alt="" />Sair
                </button>
              </a>
            </div>
          </div>

          <!-- editar informações -->
          <form action="../../../model/Arquivo/Inicializacao/auth_process.php" class="form__cadastro">
            <input type="hidden" name="type" value="update_client"> <!-- update das informações do cliente -->

            <div class="form-input">
              <label for="sign-up-name">Nome Completo</label>
              <input name="sign-up-name " placeholder="Seu Nome..." type="text" required autocomplete="off"
                value="<?= $clienteData->nome ?>" />
            </div>

            <div class="form-input">
              <label for="sign-up-date">Data de Nascimento</label>
              <input name="sign-up-date " type="date" required autocomplete="off"
                value="<?= $clienteData->datanasc ?>" />
            </div>

            <div class="form-input">
              <label for="sign-up-email">Email</label>
              <input name="sign-up-email " placeholder="Seu email..." type="email" required autocomplete="off"
                value="<?= $clienteData->email ?>" />
            </div>

            <div class="form-input">
              <label for="sign-up-tel">Telefone</label>
              <input name="sign-up-tel" id="sign-up-tel" placeholder="(00)00000-0000" type="text" required
                autocomplete="off" value="<?= $clienteData->telefone ?>" />
            </div>

            <div class="form-input desativado">
              <label for="sign-up-cep">CEP</label>
              <input name="sign-up-cep" id="sign-up-cep" placeholder="00000-000" type="text" readonly autocomplete="off"
                value="<?= $clienteData->cep ?>" />
            </div>

            <div class="form-input desativado">
              <label for="sign-up-cpf">CPF</label>
              <input name="sign-up-cpf" id="sign-up-cpf" placeholder="000.000.000-00" type="text" readonly
                autocomplete="off" value="<?= $clienteData->cpf ?>" />
            </div>

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
              <p>Criar anúncio de</p>
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
<script>
  $('#alterarsenha').click(function () { mudarSenha(); return false; });

  function mudarSenha() {
    Swal.fire({
      title: `<div class="titulo-sweetalert">Alterar Senha</div>`,
      html: `
        <form class="form-sweetalert" action="../../../model/Arquivo/Inicializacao/auth_process.php" method="POST">
        <input type="hidden" name="type" value="update_password">
        <div class="input-sweetalert">
          <label for="" >Senha</label>
          <input name="change-password " placeholder="Sua nova senha..." type="password" required autocomplete="off"" />
        </div>
        <div class="input-sweetalert">
          <label for="" >Confirmar senha</label>
          <input name="change-password-confirm " placeholder="Sua nova senha..." type="password" required autocomplete="off"" />
        </div>
        <div class="linha-sweetalert">
          <button class="botao-borda" onclick="Swal.close()"  type="button">Voltar</button>
          <button class="botao-solido" onclick=""type="submit">Mudar</button>
        </div>
        </form>


        `,
      customClass: {
        popup: 'container-input',
      },
      confirmButtonText: "Ok!",
      showConfirmButton: false,
      focusConfirm: false,
      backdrop: "rgb(87, 77, 189, 0.5",
    });
  }
</script>

</html>
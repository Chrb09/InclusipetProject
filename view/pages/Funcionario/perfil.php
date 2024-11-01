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

    $sidebarActive = "perfil";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfilfuncionario.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>
        <!-- Conteudo principal -->
        <div class="titulo">Perfil</div>

        <div class="usuario" id="usuario">
          <div class="foto-edit">
            <div class="foto-edit-wrapper">
              <img src="../../assets/img/QuemSomos/prof3.png" alt="Foto do pet" class="foto-edit-img" />
              <div class="edit">
                <img src="../../assets/img/Perfil/editar_icon.png" alt="" />
              </div>
            </div>
            <ins><a href="" id="alterarsenha">Alterar Senha</a></ins>
          </div>
          <div class="info_usuario">
            <table class="info-table">
              <tr>
                <th>Nome:</th>
                <td><?= $funcionarioData->nome ?></td>
              </tr>
              <tr>
                <th>Cargo:</th>
                <td>
                <?= $funcionarioData->codcargo ?> - 
                <?= $funcionarioDao->getCargoByCod($funcionarioData->codcargo)[1] ?>
                </td>
              </tr>
              <tr>
                <th>CPF:</th>
                <td><?= $funcionarioData->cpf ?></td>
              </tr>
              <tr>
                <th>RG:</th>
                <td><?= $funcionarioData->rg ?></td>
              </tr>
              <tr>
                <th>CEP:</th>
                <td><?= $funcionarioData->cep ?></td>
              </tr>
              <tr>
                <th>Telefone:</th>
                <td><?= $funcionarioData->telefone ?></td>
              </tr>
              <tr>
                <th>Unidade:</th>
                <td> <?= $funcionarioData->codunidade ?> -
                <?= $funcionarioDao->getUnidadeByCod($funcionarioData->codunidade)[1] ?></td>
              </tr>
            </table>
            
            <div class="linha">
              <a href="../../../model/Arquivo/Inicializacao/logout.php">
                <button class="botao-solido sair-button" onclick="" type="button">
                  <img src="../../assets/img/Perfil/sair.png" alt="" />Sair
                </button>
              </a>
            </div>
          </div>
          
        </div>
        <br />
        <br />
        <div class="acoes">
          <a class="nav-perfil" href="agendamentos.php"><img src="../../assets/img/Perfil/agendar.png" alt="" />
            <div class="card-txt">
              <p>Calendário</p>
              <strong>Agendamentos</strong>
            </div>
          </a>
          <a class="nav-perfil" href="aprovaradocao.php"><img src="../../assets/img/Perfil/anunciar.png" alt="" />
            <div class="card-txt">
              <p>Aprovar anúncio</p>
              <strong>de Adoção</strong>
            </div>
          </a>
          <a class="nav-perfil" href="cadastrarfuncionario.php"><img src="../../assets/img/Perfil/funcionario.png"
              alt="" />
            <div class="card-txt">
              <p>Cadastrar</p>
              <strong>Funcionário</strong>
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

<!--Script Alterar Senha-->
<script>
$('#alterarsenha').click(function () { mudarSenha(); return false; });

function mudarSenha() {
    Swal.fire({
      title: `<div class="titulo-sweetalert">Alterar Senha</div>`,
      html: `
        <form class="form-sweetalert" action="../../../model/Arquivo/Inicializacao/user_process.php" method="POST" onsubmit="return validarCadastro()">
        <input type="hidden" name="type" value="update_password">
        <div class="input-sweetalert">
          <label for="" >Senha</label>
          <input name="change-password" id="sign-up-password" placeholder="Sua nova senha..." type="password" required autocomplete="off"" />
        </div>
        <div class="input-sweetalert">
          <label for="" >Confirmar senha</label>
          <input name="change-password-confirm" id="sign-up-confirm-password" placeholder="Sua nova senha..." type="password" required autocomplete="off"" />
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
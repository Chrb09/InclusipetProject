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
              <img src="../../assets/img/ImagensFuncionario/<?= $funcionarioData->imagem ?>" alt="Foto do pet"
                class="foto-edit-img" />
              <label for="foto-usuario-input" class="foto-usuario-label"><img
                  src="../../assets/img/Perfil/editar_icon.png" alt="" /></label>
            </div>
            <p for="" class="nome-foto-usuario" id="nome-foto-usuario"></p>
            <ins><a href="#" id="alterarsenha">Alterar Senha</a></ins>
            <ins><a href="#" id="resetarfoto">Resetar Foto</a></ins>
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
                  <?= $funcionarioDao->getCargoByCod($funcionarioData->codcargo) ?>
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
                <td>
                  <?= $funcionarioDao->getUnidadeByCod($funcionarioData->codunidade)[1] ?>
                </td>
              </tr>
            </table>

            <!--Botões Começo-->
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

          <!-- Editar informações Começo -->
          <form action="../../../model/Arquivo/Inicializacao/user_process.php" class="form__cadastro" method="POST"
            enctype="multipart/form-data">
            <input type="file" name="foto-usuario-input" id="foto-usuario-input" hidden>
            <input type="hidden" name="resetimage" id="resetimage" value="false">
            <input type="hidden" name="type" value="update_funcionario"> <!-- update das informações do funcionario -->
            <div class="form-input">
              <label for="sign-up-nome">Nome Completo</label>
              <input name="sign-up-nome" placeholder="" type="text" required autocomplete="off"
                value="<?= $funcionarioData->nome ?>" />
            </div>

            <div class="form-input">
              <label for="sign-up-tel">Telefone</label>
              <input name="sign-up-tel" id="sign-up-tel" placeholder="(00)00000-0000" type="text" required
                autocomplete="off" value="<?= $funcionarioData->telefone ?>" />
            </div>

            <div class="form-input">
              <label for="sign-up-unidade">Unidade</label><br />
              <div class="custom-select">
                <select id="" name="sign-up-unidade" size="0" placeholder="Selecione...">
                  <?php foreach ($unidades as $unidade): ?>
                    <option value="<?= $unidade[0] ?>">
                      <?= $funcionarioDao->getUnidadeByCod($unidade[0])[1] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="form-input">
              <label for="sign-up-cargo">Cargo</label><br />
              <div class="custom-select">
                <select id="" name="sign-up-cargo" size="0">
                  <?php foreach ($cargos as $cargo): ?>
                    <option value="<?= $cargo[0] ?>">
                      <?= $funcionarioDao->getCargoByCod($cargo[0]) ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            

            
            <!--


            <div class="form-input">
              <label for="sign-up-cpf">Email</label>
              <input name="sign-up-cpf" placeholder="000.000.000-00" type="text" required autocomplete="off"
                value="<?= $funcionarioData->cpf ?>" />
            </div>

            <div class="form-input desativado">
              <label for="sign-up-cep">CEP</label>
              <input name="sign-up-cep" id="sign-up-cep" placeholder="00000-000" type="text" readonly autocomplete="off"
                value="<?= $funcionarioData->cep ?>" />
            </div>

            <div class="form-input desativado">
              <label for="sign-up-rg">CPF</label>
              <input name="sign-up-rg" id="sign-up-rg" placeholder="00.000.000-0" type="text" readonly
                autocomplete="off" value="<?= $funcionarioData->rg ?>" />
            </div>

           
            

            <!--Final do editar informações-->

            <div class="form-msg">Para alterar seu CEP ou CPF entre em contato.</div>
            <div class="button-wrapper-form">

              <!--Botões de salvar e voltar-->

              <button class="botao botao-borda" onclick="usuarioedit()" type="button">Voltar</button>
              <button class="botao botao-solido" onclick="" type="submit">Salvar</button>

            </div>
          </form>
        </div>
        <br />
        <br />
        <!--Final-->




        <!--Começo de Ações-->
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

<!--Partes de Scripts-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>

<!--Script Alterar Senha-->
<script>

  let imgPicture = document.querySelector('.foto-edit-img');  // Added the line.
  let changePicInput = document.querySelector('#foto-usuario-input');
  let resetimage = document.querySelector('#resetimage');
  $('#alterarsenha').click(function () { mudarSenha(); return false; });
  $('#resetarfoto').click(function () { resetarFoto(); return false; });


  function mudarSenha() {
    Swal.fire({
      title: `<div class="titulo-sweetalert">Alterar Senha</div>`,
      html: `
        <form class="form-sweetalert" action="../../../model/Arquivo/Inicializacao/user_process.php" method="POST">
        <input type="hidden" name="type" value="update_password_vet">
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

  function resetarFoto() {
    imgPicture.src = "../../assets/img/ImagensFuncionario/user.png"
    resetimage.value = "true"
    document.querySelector('#nome-foto-usuario').innerHTML = "";
  }

  changePicInput.addEventListener("change", function () {

    let arrBinaryFile = [];
    let file = changePicInput.files[0];  // Changed the line.
    let filename = file.name.split(/(\\|\/)/g).pop();
    let reader = new FileReader();

    // Array
    reader.readAsArrayBuffer(file);
    reader.onloadend = function (evt) {

      if (evt.target.readyState == FileReader.DONE) {
        var arrayBuffer = evt.target.result,
          array = new Uint8Array(arrayBuffer);
        for (var i = 0; i < array.length; i++) {
          arrBinaryFile.push(array[i]);
        }
      }
    }

    // Display the image rightaway
    //imgPicture.src = file.value;
    document.querySelector('#nome-foto-usuario').innerHTML = filename;

    imgPicture.src = URL.createObjectURL(file)
    resetimage.value = "false"
  });

  const usuario2 = document.getElementById("usuario");

  function usuarioedit() {
    usuario2.classList.toggle("usuario-edit");
  }</script>



</html>
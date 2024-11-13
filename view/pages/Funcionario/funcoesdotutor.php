<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleFuncTutor.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Funções do Tutor</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php

    $sidebarActive = "tutor";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfilfuncionario.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php');
        require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');
        $clienteDao = new ClienteDAO($conn, $BASE_URL);
        $clientes = $clienteDao->getAllCliente();

        ?>
        <!-- Conteudo principal -->
        <div class="titulo">Funções do tutor</div>

        <div class="infor selecionar" id="infor">
          <div class="utilizando">
            Utilizando as informações de:
            <img src="../../assets/img/ImagensPerfil/user.png" class="fotoUsuario" id="foto_tutor" />
            <p id="nome_tutor">Usuario</p>
            <ins><a href="" class="link" id="alterar">Alterar</a></ins>
          </div>
          <div class="selecionando">
            <div class="form__cadastro">
              <div class="form-input">
                <label for="">Tutor</label><br />
                <div class="custom-select">
                  <select name="tutor" id="tutor" required>
                    <?php foreach ($clientes as $cliente): ?>
                      <option value="<?= $cliente->codcliente ?>" nome="<?= $cliente->nome ?>"
                        img="<?= $cliente->imagem ?>"><?= $cliente->nome ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="button-wrapper-form">
                <button class="botao-solido" id="salvar">Salvar</button>
              </div>
            </div>
          </div>
          <br>
          <div class="acoes">
            <a class="nav-perfil" href="../Funcoes_Tutor/agendamentot.php" id="agendar"><img
                src="../../assets/img/Perfil/agendar.png" alt="" />
              <div class="card-txt">
                <p>Agendar</p>
                <strong>Consulta</strong>
              </div>
            </a>
            <a class="nav-perfil" href="../Funcoes_Tutor/anuncioadocaot.php" id="anunciar"><img
                src="../../assets/img/Perfil/anunciar.png" alt="" />
              <div class="card-txt">
                <p>Criar anúncio de</p>
                <strong>Adoção</strong>
              </div>
            </a>
            <a class="nav-perfil" href="../Funcoes_Tutor/cadastraranimalt.php" id="cadastrarpet"> <img
                src="../../assets/img/Perfil/cadastrar.png" alt="" />
              <div class="card-txt">
                <p>Cadastrar</p>
                <strong>Animal</strong>
              </div>
            </a>
            <a class="nav-perfil" href="../Funcoes_Tutor/cadastrartutor.php" id="cadastrartutor"><img
                src="../../assets/img/Perfil/funcionario.png" alt="" />
              <div class="card-txt">
                <p>Cadastrar</p>
                <strong>Tutor</strong>
              </div>
            </a>
          </div>
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
  $('#alterar').click(function () { alterar(); return false; });
  $('#salvar').click(function () { salvar(); return false; });
  let infor = document.querySelector('#infor');
  let tutor = document.querySelector('#tutor');
  let foto_tutor = document.querySelector('#foto_tutor');
  let nome_tutor = document.querySelector('#nome_tutor');

  let agendar = document.querySelector('#agendar');
  let anunciar = document.querySelector('#anunciar');
  let cadastrarpet = document.querySelector('#cadastrarpet');

  function alterar() {
    infor.classList.add("selecionar")
  }

  function salvar() {
    infor.classList.remove("selecionar")
    nome_tutor.innerHTML = $('#tutor').find(':selected').attr('nome');
    foto_tutor.src = '../../assets/img/ImagensPerfil/' + $('#tutor').find(':selected').attr('img');

    agendar.href = '../Funcoes_Tutor/agendamentot.php?codCliente=' + tutor.value;
    anunciar.href = '../Funcoes_Tutor/anuncioadocaot.php?codCliente=' + tutor.value;
    cadastrarpet.href = '../Funcoes_Tutor/cadastraranimalt.php?codCliente=' + tutor.value;

  }

</script>

</html>
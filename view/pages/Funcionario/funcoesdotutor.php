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
  <style>
    ins {
      display: block;
      width: fit-content;
    }

    .titulo {
      margin-bottom: 0.5em;
    }

    @media (max-width: 768px) {
      .content {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
      }
    }
  </style>
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
            <img src="../../assets/img/Perfil/foto_usuario.png" class="fotoUsuario" />
            <p>Miguel Yudi Baba</p>
            <ins><a href="" class="link" id="alterar">Alterar</a></ins>
          </div>
          <div class="selecionando">
            <form action="../../../model/Arquivo/Inicializacao/vettutor_process.php" class="form__cadastro"
              method="POST">
              <div class="form-input">
                <label for="">Tutor</label><br />
                <div class="custom-select">
                  <select name="especie" id="especie-select" required>

                    <option value="1">Miguel
                    </option>
                    <option value="2">Giovanna</option>
                    <option value="3">Amanda</option>
                  </select>
                </div>
              </div>
              <div class="button-wrapper-form">
                <button class="botao-solido" id="salvar">Salvar</button>
              </div>
            </form>
          </div>
        </div>


        <br />
        <div class="acoes">
          <a class="nav-perfil" href="../Funcoes_Tutor/agendamentot.php"><img src="../../assets/img/Perfil/agendar.png"
              alt="" />
            <div class="card-txt">
              <p>Agendar</p>
              <strong>Consulta</strong>
            </div>
          </a>
          <a class="nav-perfil" href="../Funcoes_Tutor/anuncioadocaot.php"><img
              src="../../assets/img/Perfil/anunciar.png" alt="" />
            <div class="card-txt">
              <p>Criar anúncio de</p>
              <strong>Adoção</strong>
            </div>
          </a>
          <a class="nav-perfil" href="../Funcoes_Tutor/cadastraranimalt.php"><img
              src="../../assets/img/Perfil/cadastrar.png" alt="" />
            <div class="card-txt">
              <p>Cadastrar</p>
              <strong>Animal</strong>
            </div>
          </a>
          <a class="nav-perfil" href="../Funcoes_Tutor/cadastrartutor.php"><img
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
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>

<script>
  $('#alterar').click(function () { alterar(); return false; });
  $('#salvar').click(function () { salvar(); return false; });
  let infor = document.querySelector('#infor');

  function alterar() {
    infor.classList.add("selecionar")
  }

  function salvar() {
    infor.classList.remove("selecionar")
  }

</script>

</html>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleGerenciarAdocao.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Aprovar Adoção</title>
  <style>
    .aprovar {
      --purple: var(--green);
      --purplehover: var(--greenhover);
    }

    .recusar {
      --purple: var(--red);
      --purplehover: var(--redhover);
    }

    .top {
      display: flex;
      flex-wrap: wrap;
      gap: 1em;
      margin-block: 1.75em;
      width: 100%;
    }

    .form-group {
      display: flex;
      align-items: center;
      gap: 1rem;
      min-width: 20%;
    }

    .radio-group {
      flex-wrap: wrap;
    }

    .swal2-popup {
      border-radius: 1rem;
      padding-inline: 3em;
      padding-block: 2em;
      font-size: inherit;
    }

    .swal2-popup .titulo {
      margin-bottom: 0;
    }

    .swal2-container .swal2-title {
      text-align: left;
      padding: 0;
      margin-bottom: 1em;
    }

    .swal2-container .swal2-html-container {
      text-align: left;
      display: flex !important;
      flex-direction: column;
      gap: 0.5em;
      padding: 0;
    }

    .swal2-container .linha {
      width: 100%;
      align-items: center;
      justify-content: center;
    }

    .swal2-container .linha button {
      width: 80%;
    }

    .form-input {
      font-weight: 500;
      width: 100%;
    }

    @media (max-width: 1024px) {
      .form-group {
        min-width: 30%;
      }
    }

    @media (max-width: 768px) {
      .top {
        display: flex;
        flex-direction: column;
        width: 70%;
      }

      .conteudo {
        justify-content: center;
      }
    }

    @media (max-width: 475px) {
      .form-group {
        flex-direction: column;
      }

      .top {
        width: 100%;
      }

      .botoes {
        flex-wrap: wrap;
      }
    }
  </style>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php
    $user = 1;
    $sidebarActive = "adocao";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headerperfil.php'); ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>
        <!-- Conteudo principal -->
        <div class="titulo">Aprovar Adoção</div>
        <!--Titulo da página-->
        <div>
          <div class="principal">
            <!--Div que contem o conteudo principal da pagina-->
            <div class="top">
              <div class="form-group">
                <label for="tipo">Mostrar:</label>
                <div class="radio-group">
                  <div class="radio-div">
                    <input type="radio" name="filtro" value="Novos" class="radio" />
                    <label for="">Novos</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="filtro" value="Aprovados" class="radio" />
                    <label for="">Aprovados</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="filtro" value="Negados" class="radio" />
                    <label for="">Negados</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="filtro" value="Todos" class="radio" checked />
                    <label for="">Todos</label>
                  </div>
                </div>
              </div>
            </div>
            <!--Inicio Item-->
            <div class="item">
              <!--Div que contem um dos animais disponiveiis prar a a adoção-->
              <img src="../../assets/img/Adocao/Animal10/img1.png" alt="Belinha" class="animal" />

              <div class="descricao-pet">
                <!--Div com a descrição do animal-->
                <div class="titulo_item">Belinha</div>
                <p class="descricao">
                  Cadela de pequeno porte, com 10 anos de idade, de pelagem branca. É um pouco ansiosa.
                </p>
                <div class="usuario">
                  <img src="../../assets/img/Perfil/foto_usuario.png" class="fotoUsuario" />
                  <p class="nomeUsuario">Miguel Yudi Baba</p>
                </div>
              </div>

              <div class="botoes">
                <!--Div que contem os botões ao lado da descrição-->
                <button class="botao-solido editar-button">
                  <img src="../../assets/img/Perfil/olho.png" alt="Editar" class="editar" />
                  Visualizar
                </button>
                <div class="aprovar">
                  <button class="botao-solido recusar" onclick="motivoRecusar()" type="button">Recusar</button>
                  <button class="botao-solido aprovar">Aprovar</button>
                </div>
              </div>
            </div>
            <!--Fim item-->

            <!--Inicio Item-->
            <div class="item">
              <!--Div que contem um dos animais disponiveiis prar a a adoção-->
              <img src="../../assets/img/Adocao/Animal9/img1.png" alt="Amarela" class="animal" />

              <div class="descricao-pet">
                <!--Div com a descrição do animal-->
                <div class="titulo_item">Amarela</div>
                <p class="descricao">Gato jovem e lerdo, ama comer pão com leite de café da manhã.</p>
                <div class="usuario">
                  <img src="../../assets/img/Perfil/foto_usuario.png" class="fotoUsuario" />
                  <p class="nomeUsuario">Miguel Yudi Baba</p>
                </div>
              </div>

              <div class="botoes">
                <!--Div que contem os botões ao lado da descrição-->
                <button class="botao-solido editar-button">
                  <img src="../../assets/img/Perfil/olho.png" alt="Editar" class="editar" />
                  Visualizar
                </button>

                <button class="adotado">Aprovado</button>
              </div>
            </div>
            <!--Fim item-->

            <!--Inicio Item-->
            <div class="item">
              <!--Div que contem um dos animais disponiveiis prar a a adoção-->
              <img src="../../assets/img/Adocao/Animal7/img1.png" alt="Bolinha" class="animal" />

              <div class="descricao-pet">
                <!--Div com a descrição do animal-->
                <div class="titulo_item">Bolinha</div>
                <p class="descricao">
                  Cadela de pequeno porte, com 12 anos de idade, de pelagem dourada e de olhos castanhos. Sofr...
                </p>
                <div class="usuario">
                  <img src="../../assets/img/Perfil/foto_usuario.png" class="fotoUsuario" />
                  <p class="nomeUsuario">Miguel Yudi Baba</p>
                </div>
              </div>
              <div class="botoes">
                <!--Div que contem os botões ao lado da descrição-->
                <button class="botao-solido editar-button">
                  <img src="../../assets/img/Perfil/olho.png" alt="Editar" class="editar" />
                  Visualizar
                </button>

                <button class="recusado">Recusado</button>
              </div>
            </div>
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

</html>
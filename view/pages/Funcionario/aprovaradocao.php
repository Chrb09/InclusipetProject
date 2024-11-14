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

    $sidebarActive = "adocao";
    include('../../components/sidebarvet.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfilfuncionario.php'); ?>

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
              <img
                src="../../assets/img/ImagensAdocao/10/5a89d6b3d4e56a0932cfa509aaa07f67c75715b6c2dcd3d8720187a34d99887c31361f01007e44ed632a450e405213559a8bef518ab2895558432824.jpg"
                alt="Belinha" class="animal" />

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
              <img
                src="../../assets/img/ImagensAdocao/9/3c2d766f99a648aa1b81de4975053de9e5a31fdef0a0826dd421faa90543b9281beddf62f2e08d47331bc27183467742e7dfa5e7b15fecc7029e2362.jpg"
                alt="Amarela" class="animal" />

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
              <img
                src="../../assets/img/ImagensAdocao/7/3befbdb4a98118863a015e994e8ea36d3ece958cf4993792095aa21ee0318a17e79c460a6f7b6c361d18dfe8efb8e271da0a9746afc9317489db32db.jpg"
                alt="Bolinha" class="animal" />

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
<script>
  function motivoRecusar() {
    Swal.fire({
      title: `<div class="titulo">Recusar Adoção</div>`,
      html: `
        <div class="form-input">
          <label for="" >Motivo por ter recusado</label>
          <textarea name="" id="" cols="40" rows="7" placeholder="Escreva sua mensagem..."></textarea>
        </div>
        <div class="linha">
          <button class="botao-borda" onclick="Swal.close()" type="button">Voltar</button>
          <button class="botao-solido recusar" onclick="Swal.close()" type="button">Recusar</button>
        </div>

        `,
      confirmButtonText: "Ok!",
      showConfirmButton: false,
      focusConfirm: false,
      backdrop: "rgb(87, 77, 189, 0.5",
    });
  }
</script>

</html>
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
  <title>Gerenciar Adoção</title>
  <style>
    .principal .titulo {
      margin-bottom: 0.75em;
    }

    .nav-perfil {
      display: flex;
      flex-direction: column;
      width: 8em;
      align-items: center;
      text-align: center;
      transition: filter 0.3s;

      &:hover {
        filter: brightness(80%);
      }
    }

    .nav-perfil img {
      width: 7em;
    }

    .card-txt {
      margin-top: 0.5em;
    }

    @media (max-width: 768px) {
      .nav-perfil {
        margin-inline: auto;
      }
    }
  </style>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php

    $sidebarActive = "adocao";
    include('../../components/sidebarperfil.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfil.php'); ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php');
        // Adicionar Condição
        $condicao = false;

        if ($condicao == true) { ?>
          <div class="principal">
            <!--Div que contem o conteudo principal da pagina-->
            <h3 class="titulo">Para Adoção</h3>
            <!--Titulo da página-->

            <!--Inicio Item-->
            <div class="item">
              <!--Div que contem um dos animais disponiveiis prar a a adoção-->
              <img src="../../assets/img/Adocao/Animal10/img1.png" alt="Belinha" class="animal" />

              <div class="descricao-pet">
                <!--Div com a descrição do animal-->
                <div class="titulo_item">Belinha</div>
                <p class="descricao">São Paulo, São Paulo</p>
                <p class="descricao">
                  Cadela de pequeno porte, com 10 anos de idade, de pelagem branca. É um pouco ansiosa.
                </p>
              </div>

              <div class="botoes">
                <!--Div que contem os botões ao lado da descrição-->
                <button class="botao-solido editar-button">
                  <img src="../../assets/img/Perfil/editar_icon.png" alt="Editar" class="editar" />
                  Editar
                </button>

                <button class="botao-borda">Adotado</button>
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
                <p class="descricao">São Paulo, São Paulo</p>
                <p class="descricao">Gato jovem e lerdo, ama comer pão com leite de café da manhã.</p>
              </div>

              <div class="botoes">
                <!--Div que contem os botões ao lado da descrição-->
                <button class="botao-solido editar-button">
                  <img src="../../assets/img/Perfil/editar_icon.png" alt="Editar" class="editar" />
                  Editar
                </button>

                <button class="botao-borda">Adotado</button>
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
                <p class="descricao">São Paulo, São Paulo</p>
                <p class="descricao">
                  Cadela de pequeno porte, com 12 anos de idade, de pelagem dourada e de olhos castanhos. Sofr...
                </p>
              </div>
              <div class="botoes">
                <button class="botao-solido editar-button">
                  <img src="../../assets/img/Perfil/editar_icon.png" alt="Editar" class="editar" />
                  Editar
                </button>

                <button class="botao-borda">Adotado</button>
              </div>
            </div>
            <!--Fim item-->
          </div>
        <?php } else { ?>
          <div class="titulo">Nenhuma adoção criada</div>
          <br>
          <a class="nav-perfil" href="anuncioadocao.php"><img src="../../assets/img/Perfil/anunciar.png" alt="" />
            <div class="card-txt">
              <p>Criar anúncio de</p>
              <strong>Adoção</strong>
            </div>
          </a>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>
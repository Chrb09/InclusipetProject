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

    require_once("../../../controller/DAO/AdocaoDAO/AdocaoDAO.php");
    require_once('../../../controller/DAO/ClienteDAO/ClienteDAO.php');

    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfilfuncionario.php');

      $adocaoDao = new AdocaoDAO($conn, $BASE_URL);
      $clienteDao = new ClienteDAO($conn, $BASE_URL);

      if (isset($_POST)) {
        $filtro = filter_input(INPUT_POST, "filtro");
      }

      if ($filtro == 'Todos') { // não pode ser aprovado nem adotado 
        $adocoes = $adocaoDao->getAllAdocaoFunc();
      } else if ($filtro == 'Aprovados') {
        $adocoes = $adocaoDao->getAllAdocaoByAprovado();
      } else if ($filtro == 'Recusados') {
        $adocoes = $adocaoDao->getAllAdocaoByRecusado();
      } else {
        $filtro = 'Novos';
        $adocoes = $adocaoDao->getAllNewAdocao();
      }


      ?>

      <div class="content">
        <?php include('../../components/navmobilevet.php'); ?>

        <!-- Conteudo principal -->
        <div class="titulo">Aprovar Adoção</div>
        <!--Titulo da página-->
        <div>

          <div class="principal">
            <!--Div que contem o conteudo principal da pagina-->

            <!-- COMEÇO DOS FILTROS -->
            <form class="top" method="POST" action="aprovaradocao.php">
              <div class="form-group">
                <label for="tipo">Mostrar:</label>
                <div class="radio-group">
                  <div class="radio-div">
                    <input type="radio" name="filtro" value="Novos" class="radio" <?= ($filtro == 'Novos') ? 'checked' : '' ?> />
                    <label for="">Pendentes</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="filtro" value="Aprovados" class="radio" <?= ($filtro == 'Aprovados') ? 'checked' : '' ?> />
                    <label for="">Aprovados</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="filtro" value="Recusados" class="radio" <?= ($filtro == 'Recusados') ? 'checked' : '' ?> />
                    <label for="">Recusados</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="filtro" value="Todos" class="radio" <?= ($filtro == 'Todos') ? 'checked' : '' ?> />
                    <label for="">Todos</label>
                  </div>
                </div>
                <button type="submit" class="botao-solido">Filtrar</button>
              </div>
            </form>
            <!-- FIM DOS FILTROS -->

            <?php foreach ($adocoes as $adocao):
              $imagens = $adocaoDao->getImagemAdocaoByCod($adocao->CodAdocao);
              $cliente = $clienteDao->findById($adocao->CodCliente) ?>

              <!-- INICIO ITEM -->
              <div class="item">
                <!--Div que contem um dos animais disponiveiis prar a a adoção-->
                <img src="../../assets/img/ImagensAdocao/<?= $adocao->CodAdocao ?>/<?= $imagens[0] ?>"
                  alt="<?= $adocao->Nome ?>" class="animal" />

                <div class="descricao-pet">
                  <!--Div com a descrição do animal-->
                  <div class="titulo_item"><?= $adocao->Nome ?></div>
                  <p class="descricao">
                    <?= $adocao->Descricao ?>
                  </p>
                  <div class="usuario">
                    <img src="../../assets/img/ImagensPerfil/<?= $cliente->imagem ?>" class="fotoUsuario" />
                    <p class="nomeUsuario"><?= $cliente->nome ?></p>
                  </div>
                </div>

                <div class="botoes">
                  <!--Div que contem os botões ao lado da descrição-->
                  <button class="botao-solido editar-button" type="button"
                    onclick="location.href='../adocao/animal.php?CodAdocao=<?= $adocao->CodAdocao ?>'">
                    <img src="../../assets/img/Perfil/olho.png" alt="Editar" class="editar" />
                    Visualizar
                  </button>

                  <?php if ($adocao->Aprovado == 1) { ?>
                    <button class="adotado">Aprovado</button>

                  <?php } else if ($adocao->MotivoRecusar != '') { ?>
                      <button class="recusado">Recusado</button>
                  <?php } else if ($adocao->Aprovado == 0) { ?>
                        <div class="aprovar">
                          <button class="botao-solido recusar"
                            onclick="motivoRecusar('<?= $adocao->Nome ?>','<?= $adocao->CodAdocao ?>')"
                            type="button">Recusar</button>

                          <form action="../../../model/Arquivo/Inicializacao/adoption_process.php" method="POST">
                            <input type="hidden" name="type" value="update_aprovado">
                            <input type="hidden" name="codAdocao" value="<?= $adocao->CodAdocao ?>">
                            <input type="hidden" name="aprovado" value="1">
                            <input type="hidden" name="motivo" value="">
                            <button class="botao-solido aprovar">Aprovar</button>
                          </form>
                        </div>
                  <?php } ?>
                </div>
              </div>
              <!-- FIM ITEM -->
            <?php endforeach; ?>
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
  function motivoRecusar(Nome, Id) {
    Swal.fire({
      title: `<div class="titulo">Recusar Adoção</div>`,
      html: `
      <form class="form-sweetalert" action="../../../model/Arquivo/Inicializacao/adoption_process.php" method="POST">
      <input type="hidden" name="type" value="update_aprovado">
       <input type="hidden" name="codAdocao" value="` + Id + `">
      <input type="hidden" name="aprovado" value="0">
        <div class="form-input">
          <label for="" >Motivo por ter recusado ` + Nome + `</label>
          <textarea name="motivo" id="" cols="40" rows="7" placeholder="Escreva sua mensagem..."></textarea>
        </div>
        <div class="linha">
          <button class="botao-borda" onclick="Swal.close()" type="button">Voltar</button>
          <button class="botao-solido" onclick="" type="submit">Enviar</button>
        </div>
</form>

        `,
      confirmButtonText: "Ok!",
      showConfirmButton: false,
      focusConfirm: false,
      backdrop: "rgb(87, 77, 189, 0.5",
    });
  }
</script>

</html>
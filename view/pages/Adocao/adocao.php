<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleAdocao.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Adoção</title>
</head>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "adocao";
  include('../../components/headers/header.php');
  require_once("../../../controller/DAO/AdocaoDAO/AdocaoDAO.php");

  $adocaoDao = new AdocaoDAO($conn, $BASE_URL);
  $adocoes = $adocaoDao->getAllAdocao();

  ?>
  <!--Conteúdo-->
  <a href="">
    <div class="banner_adocao"></div>
  </a>
  <div class="container container__adocao">
    <div class="titulo">Adote um Animalzinho!</div>
    <div class="grid__adocao">

      <?php
      foreach ($adocoes as $adocao):

        $imagens = $adocaoDao->getImagemAdocaoByCod($adocao->CodAdocao);
        ?>
        <div class="cartao-transp">
          <a href="animal.php?CodAdocao=<?= $adocao->CodAdocao ?>"><img
              src="../../assets/img/ImagensAdocao/<?= $adocao->CodAdocao ?>/<?= $imagens[0] ?>" alt=""
              class="cartao__imagem" /></a>
          <div class="cartao__content">
            <p>
              <strong><?= $adocao->Nome ?></strong><br />
              <?= $adocao->Endereco ?>
            </p>
            <div class="cartao_texto">
              <?= $adocao->Descricao ?>
            </div>
            <button class="botao-solido" onclick="location.href='animal.php?CodAdocao=<?= $adocao->CodAdocao ?>'">Quero
              Adotar!</button>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>

</html>
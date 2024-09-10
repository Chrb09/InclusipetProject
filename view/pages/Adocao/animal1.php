<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleAnimal.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Fonseca</title>
  <style>
    body {
      background: linear-gradient(0deg, rgba(87, 77, 189, 0.5) 0%, rgba(87, 77, 189, 0.5) 100%),
        url(../../assets/img/Adocao/Animal1/img5.png), lightgray 10%;
      background-repeat: no-repeat;
      background-size: cover;
    }

    @media (max-width: 640px) {
      body {
        background: none;
      }
    }
  </style>
</head>

<body>
  <!-- HEADER-->
  <?php
  $activePage = "adocao";
  include('../../components/header.php');
  ?>

  <!--Conteudo-->
  <div class="container container__pet">
    <div class="galeria">
      <div class="imagem-grande-wrapper">
        <img src="../../assets/img/Adocao/Animal1/img1.png" alt="animal1" class="imagem-grande" />
        <img src="../../assets/img/Adocao/Animal1/img2.png" alt="animal2" class="imagem-grande" />
        <img src="../../assets/img/Adocao/Animal1/img3.png" alt="animal3" class="imagem-grande" />
        <img src="../../assets/img/Adocao/Animal1/img4.png" alt="animal4" class="imagem-grande" />
        <img src="../../assets/img/Adocao/Animal1/img5.png" alt="animal5" class="imagem-grande" />
      </div>
      <div class="imagem-pequena-container">
        <div class="imagem-pequena-wrapper" onclick="currentSlide(1)">
          <img src="../../assets/img/Adocao/Animal1/img1.png" alt="" class="imagem-pequena" />
        </div>
        <div class="imagem-pequena-wrapper" onclick="currentSlide(2)">
          <img src="../../assets/img/Adocao/Animal1/img2.png" alt="" class="imagem-pequena" />
        </div>
        <div class="imagem-pequena-wrapper" onclick="currentSlide(3)">
          <img src="../../assets/img/Adocao/Animal1/img3.png" alt="" class="imagem-pequena" />
        </div>
        <div class="imagem-pequena-wrapper" onclick="currentSlide(4)">
          <img src="../../assets/img/Adocao/Animal1/img4.png" alt="" class="imagem-pequena" />
        </div>
        <div class="imagem-pequena-wrapper" onclick="currentSlide(5)">
          <img src="../../assets/img/Adocao/Animal1/img5.png" alt="" class="imagem-pequena" />
        </div>
      </div>
    </div>

    <script src="../../assets/js/pet_gallery.js"></script>

    <div class="info">
      <div>
        <div class="titulo">Fonseca</div>
        <div class="caracteristicas">
          <b>Canino | Macho | 15 Anos | Grande | Castrado</b>
        </div>
      </div>
      <div class="quem">
        <strong>Quem é Fonseca?</strong>
        <p>
          Um cachorro de olhos marrons claros, de porte médio, velho, de pelagem curta, branca e com manchas pretas
          pelo seu corpo.
        </p>
      </div>
      <div class="detalhes">
        <strong>Mais Detalhes</strong>
        <div class="categorias">
          <div class="categoria">Vira-Lata</div>
          <div class="categoria">Brincalhão</div>
          <div class="categoria">Ama comer escondido</div>
          <div class="categoria">Precisa de carinho</div>
        </div>
      </div>
      <div class="contato">
        <strong>Quer Adotar?</strong>
        (11) 11111-1111 <br />
        Av. Aguia de Haia - SP
      </div>
    </div>
  </div>
  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>

</html>
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
  require_once("../../../controller/DAO/PetDAO/PetDAO.php");

  $pet = new Pet();
  $petDao = new PetDAO($conn, $BASE_URL);
  $petData = $petDao->getPetsByCodCliente(true);
  ?>
  <!--Conteúdo-->
  <a href="">
    <div class="banner_adocao"></div>
  </a>
  <div class="container container__adocao">
    <div class="titulo">Adote um Animalzinho!</div>
    <div class="grid__adocao">

      <?php ?>
      <div class="cartao-transp">
        <a href="animal1.php?id=1"><img src="../../assets/img/Adocao/Animal1/img1.png" alt=""
            class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Fonseca</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Um cachorro de olhos marrons claros, de porte médio, velho, de pelagem curta, branca e com manchas pretas
            pelo seu corpo.
          </div>
          <button class="botao-solido" onclick="location.href='animal1.php'">Quero Adotar!</button>
        </div>
      </div>
      <?php ?>

      <!-- ANIMAL 01 -->
      <div class="cartao-transp">
        <a href="animal1.php"><img src="../../assets/img/Adocao/Animal1/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Fonseca</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Um cachorro de olhos marrons claros, de porte médio, velho, de pelagem curta, branca e com manchas pretas
            pelo seu corpo.
          </div>
          <button class="botao-solido" onclick="location.href='animal1.php'">Quero Adotar!</button>
        </div>
      </div>

      <!-- ANIMAL 02 -->
      <div class="cartao-transp">
        <a href="animal2.php"><img src="../../assets/img/Adocao/Animal2/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Afrodite</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Gata jovem de olhos azuis de pelagem dourada, nascida sem as pernas traseiras. Foi achada ainda filhote e
            levada para um centro de adoção.
          </div>
          <button class="botao-solido" onclick="location.href='animal2.php'">Quero Adotar!</button>
        </div>
      </div>

      <!-- ANIMAL 03 -->
      <div class="cartao-transp">
        <a href="animal3.php"><img src="../../assets/img/Adocao/Animal3/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Neném</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Cadela de porte médio, peluda, pelagem preta e que possui manchas brancas nas patas. Possui dificuldades
            em andar devido um acidente de carro.
          </div>
          <button class="botao-solido" onclick="location.href='animal3.php'">Quero Adotar!</button>
        </div>
      </div>

      <!-- ANIMAL 04 -->
      <div class="cartao-transp">
        <a href="animal4.php"><img src="../../assets/img/Adocao/Animal4/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Max</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Um cachorro de porte médio, juvenil, de pelagem preta com manchas brancas no queixo, no peito e na
            barriga.
          </div>
          <button class="botao-solido" onclick="location.href='animal4.php'">Quero Adotar!</button>
        </div>
      </div>

      <!-- ANIMAL 05 -->
      <div class="cartao-transp">
        <a href="animal5.php"><img src="../../assets/img/Adocao/Animal5/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Fofinha</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Gata jovem, de olhos azuis, branca com manchas marrons e pretas pelo seu corpo. Precisa de cuidado
            especial devido a doença FeLV, a leucemia felina.
          </div>
          <button class="botao-solido" onclick="location.href='animal5.php'">Quero Adotar!</button>
        </div>
      </div>

      <!-- ANIMAL 06 -->
      <div class="cartao-transp">
        <a href="animal6.php"><img src="../../assets/img/Adocao/Animal6/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Marrom</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Cachorro adulto, marrom de patas brancas e de olhos castanhos. Após sofrer um acidente de carro lutou
            bastante pela sua vida e agora procura por um lar com muito amor e carinho.
          </div>
          <button class="botao-solido" onclick="location.href='animal6.php'">Quero Adotar!</button>
        </div>
      </div>

      <!-- ANIMAL 07 -->
      <div class="cartao-transp">
        <a href="animal7.php"><img src="../../assets/img/Adocao/Animal7/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Bolinha</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Cadela de pequeno porte, com 12 anos de idade, de pelagem dourada e de olhos castanhos. Sofreu abuso dos
            seus donos anteriores e agora procura por uma casa que lhe proporcione bastante amor e carinho.
          </div>
          <button class="botao-solido" onclick="location.href='animal7.php'">Quero Adotar!</button>
        </div>
      </div>

      <!-- ANIMAL 08 -->
      <div class="cartao-transp">
        <a href="animal8.php"><img src="../../assets/img/Adocao/Animal8/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Bebê</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">Calopsita jovem, amarelada e de bochechas vermelhas e muito agitada.</div>
          <button class="botao-solido" onclick="location.href='animal8.php'">Quero Adotar!</button>
        </div>
      </div>

      <!-- ANIMAL 09 -->
      <div class="cartao-transp">
        <a href="animal9.php"><img src="../../assets/img/Adocao/Animal9/img1.png" alt="" class="cartao__imagem" /></a>
        <div class="cartao__content">
          <p>
            <strong>Amarela</strong><br />
            São Paulo, São Paulo
          </p>
          <div class="cartao_texto">
            Gata jovem e ativa, ama comer pão com leite de café da manhã e tem a cauda tortinha. Ama cheirar erva de
            gato.
          </div>
          <button class="botao-solido" onclick="location.href='animal9.php'">Quero Adotar!</button>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <?php
  include('../../components/footer.php');
  ?>
</body>

</html>
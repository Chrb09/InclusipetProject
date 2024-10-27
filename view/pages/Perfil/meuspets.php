<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <link rel="stylesheet" href="../../assets/css/StyleGeral.css" />
  <!-- CSS EXTERNO GERAL -->
  <link rel="stylesheet" href="../../assets/css/StyleUsuario.css" />
  <link rel="stylesheet" href="../../assets/css/StyleMeusPets.css" />
  <!-- CSS EXTERNO PAGINA -->
  <link rel="icon" href="../../assets/img/Outros/inclusipet.ico" />
  <!-- ICON -->
  <title>Meus Pets</title>
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php

    $sidebarActive = "pets";
    include('../../components/sidebarperfil.php');

    require_once("../../../controller/DAO/PetDAO/PetDAO.php");
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfil.php');

      $petDao = new PetDAO($conn, $BASE_URL);

      $pets = $petDao->getPetsByCodCliente($clienteData->codcliente);

      if ($pets !== []) {
        if (isset($_GET['codAnimal'])) {
          $CodAnimal = $_GET['codAnimal'];
        } else {

          $CodAnimal = $pets[0]->CodAnimal;
        }
        $petInfo = $petDao->findByCod($CodAnimal);
      }
      ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>
        <div class="titulo"><?php
        if ($pets !== []) {
          echo ("Meus Pets");
        } else {
          echo ("Nenhum pet cadastrado!");
        } ?></div>
        <div class="pets">

          <div class="meus-pets">
            <?php


            foreach ($pets as $pet): ?>
              <a href="meuspets.php?codAnimal=<?= $pet->CodAnimal ?>">
                <button class="button-pet selecionado">
                  <img src="../../assets/img/ImagensPet/<?php
                  if ($pet->Imagem == "") {
                    echo ("pet.png");
                  } else {
                    echo ($pet->Imagem);
                  }
                  ?>" alt="" class="img-menor" /> <?= $pet->Nome ?>
                  <input type="radio" name="pet" value="<?= $pet->CodAnimal ?>" id="idlabel<?= $pet->CodAnimal ?>"
                    class="check-pet" <?php
                    if ($pet->CodAnimal == $petInfo->CodAnimal)
                      print ("checked"); ?>>
                </button>
              </a>
            <?php endforeach; ?>
          </div>
          <button class="button-pet button-cadastrar" onclick="location.href='cadastraranimal.php'" type="button">
            <img src="../../assets/img/Perfil/adicionar.png" alt="" class="img-menor novo-pet" />
            <div class="cadastrar-pet">Cadastrar Novo Pet</div>
          </button>
        </div>
        <div class="pet-info">
          <?php if ($pets !== []): ?>
            <div class="pet-info-img">
              <img src="../../assets/img/ImagensPet/<?php
              if ($petInfo->Imagem == "") {
                echo ("pet.png");
              } else {
                echo ($petInfo->Imagem);
              }
              ?>" alt="" />
              <strong><?= $petInfo->Nome ?></strong>
            </div>
            <div class="pet-info-container">
              <b>Detalhes</b>
              <div class="table-row">
                <table class="info-table">
                  <tr>
                    <th>Espécie:</th>
                    <td><?= $petDao->getPetEspecie($petInfo) ?></td>
                  </tr>
                  <tr>
                    <th>Raça:</th>
                    <td><?= $petDao->getPetRaca($petInfo) ?></td>
                  </tr>
                  <tr>
                    <th>Sexo:</th>
                    <td><?= $petInfo->Sexo ?></td>
                  </tr>
                  <tr>
                    <th>Data Nasc:</th>
                    <td><?php if ($petInfo->DataNasc == "") {
                      echo ("-");
                    } else {
                      echo ($petInfo->DataNasc);
                    } ?></td>
                  </tr>
                </table>
                <table class="info-table">
                  <tr>
                    <th>Data Aprox:</th>
                    <td><?php if ($petInfo->DataAprox == "") {
                      echo ("-");
                    } else {
                      echo ($petInfo->DataAprox);
                    } ?></td>
                  </tr>
                  <tr>
                    <th>Castrado?</th>
                    <td><?php if ($petInfo->Castrado == 0) {
                      echo ("Não");
                    } else {
                      echo ("Sim");
                    } ?></td>
                  </tr>
                  <tr>
                    <th>Peso:</th>
                    <td><?= $petInfo->Peso ?> KG</td>
                  </tr>
                </table>
              </div>
              <div class="button-row">
                <button class="botao-solido"
                  onclick="location.href='agendamento.php?codAnimal=<?= $petInfo->CodAnimal ?>'" type="button">
                  Agendar Consulta
                </button>
                <button class="botao-solido editar-button"
                  onclick="location.href='cadastraranimal.php?edit=<?= $petInfo->CodAnimal ?>'" type="button">
                  <img src="../../assets/img/Perfil/editar_icon.png" alt="" />Editar
                </button>
              </div>
            </div>
          <?php endif;
          ?>
        </div>

      </div>
    </div>
  </div>
</body>

</html>
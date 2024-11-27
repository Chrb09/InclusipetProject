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
  <title>Cadastrar Animal</title>
  <style>
    #form-data {
      display: flex;
      flex-direction: column;
      width: 100%;
      gap: 0.35em;
    }
  </style>
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
      $especies = $petDao->getAllEspecies();

      if (isset($_GET['edit'])) {
        $CodAnimal = $_GET['edit'];
        $petInfo = $petDao->findByCod($CodAnimal);
      }


      ?>


      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>

        <!-- Começo do conteúdo principal -->

        <?php if (!isset($_GET['edit'])) { ?>
          <div class="titulo">Cadastrar Pet</div>
          <div class="cadastrar_pet">
            <div class="foto-edit">
              <div class="foto-edit-wrapper">
                <img src="../../assets/img/ImagensPet/pet.png" alt="Foto do pet" class="foto-edit-img" />
                <label for="foto-pet-input" class="foto-pet-label"><img src="../../assets/img/Perfil/editar_icon.png"
                    alt="" /></label>
              </div>
              <p for="" class="nome-foto-pet" id="nome-foto-pet"></p>
              <ins><a href="#" id="resetarfoto">Resetar Foto</a></ins>
            </div>

            <form action="../../../model/Arquivo/Inicializacao/pet_process.php" class="form__cadastro" method="POST"
              enctype="multipart/form-data">
              <input type="file" name="foto-pet-input" id="foto-pet-input" hidden>
              <input type="hidden" name="resetimage" id="resetimage" value="false">
              <input type="hidden" name="type" value="create">

              <div class="form-input">
                <label for="">Nome</label><br />
                <input type="text" name="nome" maxlength="50" placeholder="Nome do seu pet" required />
              </div>
              <div class="form-input">
                <label for="">Espécie</label><br />
                <div class="custom-select">
                  <select name="especie" id="especie-select" required>
                    <option value="" disabled selected hidden>Escolha uma espécie...</option>
                    <?php foreach ($especies as $especie): ?>
                      <option value="<?= $especie[0] ?>"><?= $especie[1] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-input">
                <label for="">Raça</label><br />
                <div class="custom-select" id="raca-select-custom">
                  <select name="raca" id="raca-select" required>
                    <option value="" disabled selected hidden>Escolha uma espécie antes...</option>
                  </select>
                </div>
              </div>
              <div class="form-input">
                <label for="">Sexo</label>
                <div class="radio-group">
                  <div class="radio-div">
                    <input type="radio" name="sexo" value="Fêmea" class="radio" required />
                    <label for="">Fêmea</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="sexo" value="Macho" class="radio" required />
                    <label for="">Macho</label>
                  </div>
                </div>
              </div>
              <div class="form-input">
                <div id="form-data">
                  <label for="">Data de Nascimento</label><br />
                  <input type="date" name="datanasc" id="datanasc" min="1950-01-01" />
                </div>
                <div class="radio-div">
                  <input type="checkbox" id="checkdata" class="check" /> Não lembro a data exata
                </div>
              </div>
              <div class="form-input desativado" id="form-aprox">
                <label for="">Data Aproximada (Ano)</label><br />
                <input type="number" name="dataaprox" id="dataaprox" placeholder="0000" disabled />
              </div>
              <div class="form-input">
                <label for="">Peso (kg)</label><br />
                <input type="number" max="99" maxlength="2" name="peso" placeholder="Peso do seu pet" required />
              </div>

              <div class="form-input">
                <label for="">Castrado?</label>
                <div class="radio-group">
                  <div class="radio-div">
                    <input type="radio" name="castrado" value="1" class="radio" required />
                    <label for="">Sim</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="castrado" value="0" class="radio" required />
                    <label for="">Não</label>
                  </div>
                </div>
              </div>

              <div class="button-wrapper-form">
                <button class="botao botao-solido" onclick="" type="submit">Salvar</button>
              </div>
            </form>
          </div>
        <?php } else {
          ?>
          <div class="titulo">Editar Pet</div>
          <div class="cadastrar_pet">
            <div class="foto-edit">
              <div class="foto-edit-wrapper">
                <img src="../../assets/img/ImagensPet/<?php
                if ($petInfo->Imagem == "") {
                  echo ("pet.png");
                } else {
                  echo ($petInfo->Imagem);
                }
                ?>" alt="Foto do pet" class="foto-edit-img" />
                <label for="foto-pet-input" class="foto-pet-label"><img src="../../assets/img/Perfil/editar_icon.png"
                    alt="" /></label>
              </div>
              <p for="" class="nome-foto-pet" id="nome-foto-pet"></p>
              <ins><a href="#" id="resetarfoto">Resetar Foto</a></ins>
            </div>

            <form action="../../../model/Arquivo/Inicializacao/pet_process.php" class="form__cadastro" method="POST"
              enctype="multipart/form-data">
              <input type="file" name="foto-pet-input" id="foto-pet-input" value="" hidden>
              <input type="hidden" name="resetimage" id="resetimage" value="false">
              <input type="hidden" name="type" value="edit">
              <input type="hidden" name="codpet" value="<?= $petInfo->CodAnimal ?>">
              <input type="hidden" name="imagematual" value="<?= $petInfo->Imagem ?>">
              <div class="form-input">
                <label for="">Nome</label><br />
                <input type="text" name="nome" maxlength="50" placeholder="Nome do seu pet" value="<?= $petInfo->Nome ?>"
                  required />
              </div>
              <div class="form-input">
                <label for="">Espécie</label><br />
                <div class="custom-select">
                  <select name="especie" id="especie-select" required>
                    <?php foreach ($especies as $especie): ?>
                      <option value="<?= $especie[0] ?>" <?= ($petDao->getPetEspecie($petInfo) == $especie[1]) ? 'selected' : '' ?>><?= $especie[1] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-input">
                <label for="">Raça</label><br />

                <?php foreach ($especies as $especie) {
                  if ($especie[1] == $petDao->getPetEspecie($petInfo)) {
                    $racas = $petDao->getRacasByEspecie($especie[0])
                      ?>
                    <div class="custom-select" id="raca-select-custom">
                      <select name="raca" id="raca-select" required>
                        <?php foreach ($racas as $raca): ?>
                          <option value="<?= $raca[0] ?>" <?= ($raca[0] == $petInfo->CodRaca) ? 'selected' : '' ?>>
                            <?= $raca[1] ?>
                          </option>
                        <?php endforeach; ?>
                    </div>
                  <?php }
                } ?>

              </div>

              <div class="form-input">
                <label for="">Sexo</label>
                <div class="radio-group">
                  <div class="radio-div">
                    <input type="radio" name="sexo" value="Fêmea" class="radio" required <?= ($petInfo->Sexo == 'Fêmea') ? 'checked' : '' ?> />
                    <label for="">Fêmea</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="sexo" value="Macho" class="radio" required <?= ($petInfo->Sexo == 'Macho') ? 'checked' : '' ?> />
                    <label for="">Macho</label>
                  </div>
                </div>
              </div>
              <?php if ($petInfo->DataNasc == "") { ?>
                <div class="form-input">
                  <div id="form-data" class="desativado">
                    <label for="">Data de Nascimento</label><br />
                    <input type="date" name="datanasc" id="datanasc" min="1950-01-01" disabled />
                  </div>
                  <div class="radio-div">
                    <input type="checkbox" id="checkdata" class="check" checked /> Não lembro a data exata
                  </div>
                </div>
              <?php } else { ?>
                <div class="form-input">
                  <div id="form-data">
                    <label for="">Data de Nascimento</label><br />
                    <input type="date" name="datanasc" id="datanasc" min="1950-01-01" value="<?= $petInfo->DataNasc ?>" />
                  </div>
                  <div class="radio-div">
                    <input type="checkbox" id="checkdata" class="check" /> Não lembro a data exata
                  </div>
                </div>
              <?php } ?>


              <?php if ($petInfo->DataAprox == "") { ?>
                <div class="form-input desativado" id="form-aprox">
                  <label for="">Data Aproximada (Ano)</label><br />
                  <input type="number" name="dataaprox" id="dataaprox" placeholder="0000" disabled />
                </div>
              <?php } else { ?>
                <div class="form-input" id="form-aprox">
                  <label for="">Data Aproximada (Ano)</label><br />
                  <input type="number" name="dataaprox" id="dataaprox" placeholder="0000"
                    value="<?= $petInfo->DataAprox ?>" />
                </div>
              <?php } ?>

              <div class="form-input">
                <label for="">Peso (kg)</label><br />
                <input type="number" max="99" maxlength="2" name="peso" placeholder="Peso do seu pet" required
                  value="<?= $petInfo->Peso ?>" />
              </div>

              <div class="form-input">
                <label for="">Castrado?</label>
                <div class="radio-group">
                  <div class="radio-div">
                    <input type="radio" name="castrado" value="1" class="radio" required <?= ($petInfo->Castrado == '1') ? 'checked' : '' ?> />
                    <label for="">Sim</label>
                  </div>
                  <div class="radio-div">
                    <input type="radio" name="castrado" value="0" class="radio" required <?= ($petInfo->Castrado == '0') ? 'checked' : '' ?> />
                    <label for="">Não</label>
                  </div>
                </div>
              </div>

              <div class="button-wrapper-form">
                <button class="botao botao-borda" onclick="location.href='meuspets.php'" type="button">Voltar</button>
                <button class="botao botao-solido" onclick="" type="submit">Salvar</button>
              </div>
            </form>
          </div>
          <?php
        } ?>
        <!-- Fim do conteúdo principal -->
      </div>
    </div>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../assets/js/perfil.js"></script>
<script>

  let imgPicture = document.querySelector('.foto-edit-img');  // Added the line.
  let changePicInput = document.querySelector('#foto-pet-input');
  let resetimage = document.querySelector('#resetimage');
  let checkdata = document.querySelector('#checkdata');
  let formaprox = document.querySelector('#form-aprox');
  let formdata = document.querySelector('#form-data');
  let dataaprox = document.querySelector('#dataaprox');
  let datanasc = document.querySelector('#datanasc');
  let especieselect = document.querySelector('#especie-select');
  let racaselect = document.querySelector('#raca-select');
  let racaselectcustom = document.querySelector('#raca-select-custom');

  document.getElementById('especie-select').addEventListener('change', function () {
    const especieId = this.value; // ID da espécie selecionada
    const racaSelect = document.getElementById('raca-select');

    // Limpa o select de raças
    racaSelect.innerHTML = '<option value="">Selecione uma raça</option>';

    if (especieId) {
      // Faz a requisição para buscar as raças
      fetch(`../../../controller/DAO/PetDAO/get_racas.php?especie_id=${especieId}`)
        .then(response => response.json())
        .then(data => {
          data.forEach(raca => {
            const option = document.createElement('option');
            option.value = raca.CodRaca; // ID da raça
            option.textContent = raca.Descricao; // Nome da raça
            racaSelect.appendChild(option);
          });
        })
        .catch(error => console.error('Erro ao carregar raças:', error));
    }
  });


  $('#dataaprox').mask("0000");

  $('#resetarfoto').click(function () { resetarFoto(); return false; });

  function resetarFoto() {
    imgPicture.src = "../../assets/img/ImagensPet/pet.png"
    resetimage.value = "true"
    document.querySelector('#nome-foto-pet').innerHTML = "";
  }

  checkdata.addEventListener("change", function () {
    dataaprox.value = ""
    datanasc.value = ""
    if (checkdata.checked) {
      formaprox.classList.remove("desativado")
      formdata.classList.add("desativado")
      datanasc.disabled = true
      dataaprox.disabled = false
    } else {
      formaprox.classList.add("desativado")
      formdata.classList.remove("desativado")
      datanasc.disabled = false
      dataaprox.disabled = true
    }
  })

  changePicInput.addEventListener("change", function () {

    let arrBinaryFile = []
    let file = changePicInput.files[0]  // Changed the line.
    let filename = file.name.split(/(\\|\/)/g).pop()
    let reader = new FileReader()

    // Array
    reader.readAsArrayBuffer(file);
    reader.onloadend = function (evt) {

      if (evt.target.readyState == FileReader.DONE) {
        var arrayBuffer = evt.target.result,
          array = new Uint8Array(arrayBuffer)
        for (var i = 0; i < array.length; i++) {
          arrBinaryFile.push(array[i])
        }
      }
    }

    // Display the image rightaway
    //imgPicture.src = file.value;
    document.querySelector('#nome-foto-pet').innerHTML = filename;

    imgPicture.src = URL.createObjectURL(file)
    resetimage.value = "false"
  });
</script>

</html>
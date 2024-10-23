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
</head>

<body>
  <!-- PERFIL -->
  <div class="container-usuario">
    <?php
    $user = 0;
    $sidebarActive = "pets";
    include('../../components/sidebarperfil.php');
    ?>
    <div class="main">
      <?php include('../../components/headers/headerperfil.php'); ?>

      <div class="content">

        <?php include('../../components/navmobileperfil.php'); ?>
        <!-- Começo do conteúdo principal -->
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

          <form action="pet_process.php" class="form__cadastro" method="POST" enctype="multipart/form-data">
            <input type="file" name="foto-pet-input" id="foto-pet-input" hidden>
            <input type="hidden" name="resetimage" id="resetimage" value="false">
            <input type="hidden" name="type" value="create">
            <div class="form-input">
              <label for="">Nome</label><br />
              <input type="text" name="nome" id="" />
            </div>
            <div class="form-input">
              <label for="">Espécie</label><br />
              <div class="custom-select">
                <select id="" name="especie" size="1">
                  <option value="cachorro">Cachorro</option>
                  <option value="gato">Gato</option>
                  <option value="passaro">Pássaro</option>
                </select>
              </div>
            </div>
            <div class="form-input">
              <label for="">Raça</label><br />
              <div class="custom-select">
                <select id="" name="raca" size="0" placeholder="Selecione...">
                  <option value="cachorro">Cachorro</option>
                  <option value="gato">Gato</option>
                  <option value="passaro">Pássaro</option>
                </select>
              </div>
            </div>
            <div class="form-input">
              <label for="">Sexo</label>
              <div class="radio-group">
                <div class="radio-div">
                  <input type="radio" name="sexo" value="Fêmea" class="radio" />
                  <label for="">Fêmea</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="sexo" value="Macho" class="radio" />
                  <label for="">Macho</label>
                </div>
              </div>
            </div>
            <div class="form-input">
              <label for="">Data de Nascimento</label><br />
              <input type="date" value="" name="datanasc" max="" min="1950-01-01" />
              <div class="radio-div">
                <input type="checkbox" id="" class="check" /> Não lembro a data exata
              </div>
            </div>
            <div class="form-input desativado">
              <label for="">Data Aproximada</label><br />
              <input type="date" name="dataaprox" value="" disabled />
            </div>
            <div class="form-input">
              <label for="">Peso (kg)</label><br />
              <input type="number" name="peso" value="" />
            </div>

            <div class="form-input">
              <label for="">Castrado?</label>
              <div class="radio-group">
                <div class="radio-div">
                  <input type="radio" name="castrado" value="Sim" class="radio" />
                  <label for="">Sim</label>
                </div>
                <div class="radio-div">
                  <input type="radio" name="castrado" value="Não" class="radio" />
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
  $('#resetarfoto').click(function () { resetarFoto(); return false; });

  function resetarFoto() {
    imgPicture.src = "../../assets/img/ImagensPet/pet.png"
    resetimage.value = "true"
    document.querySelector('#nome-foto-pet').innerHTML = "";
  }

  changePicInput.addEventListener("change", function () {

    let arrBinaryFile = [];
    let file = changePicInput.files[0];  // Changed the line.
    let filename = file.name.split(/(\\|\/)/g).pop();
    let reader = new FileReader();

    // Array
    reader.readAsArrayBuffer(file);
    reader.onloadend = function (evt) {

      if (evt.target.readyState == FileReader.DONE) {
        var arrayBuffer = evt.target.result,
          array = new Uint8Array(arrayBuffer);
        for (var i = 0; i < array.length; i++) {
          arrBinaryFile.push(array[i]);
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